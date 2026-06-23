<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'pet_shop_website');
define('DB_USER', 'root');
define('DB_PASS', '');

function conectarBanco(): PDO {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Lança exceções em erros SQL
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // Retorna arrays associativos por padrão
            PDO::ATTR_EMULATE_PREPARES   => false,                   // Usa prepared statements reais do MySQL (mais seguro)
        ]);

        return $pdo;

    } catch (PDOException $e) {
        // ⚠️  Em produção: substituir o echo por error_log() e exibir mensagem genérica
        // error_log($e->getMessage()); 
        // echo "Erro interno. Tente novamente mais tarde.";
        echo "Erro ao conectar ao banco: " . $e->getMessage();
        exit;
    }
}

function excluirRegistro(PDO $pdo, string $tabela, int $id): bool {
    $tabelasPermitidas = ['customers', 'employees'];  // <- adicione novas tabelas aqui conforme o projeto crescer

    if (!in_array($tabela, $tabelasPermitidas, strict: true)) {
        throw new InvalidArgumentException("Tabela '$tabela' não permitida.");
    }

    $sql  = "DELETE FROM $tabela WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}

function buscarUsuarioPorLogin(PDO $pdo, string $email): array|false {
    $sql = "SELECT id, name, email, password, nivel_de_acesso, tipo_usuario
        FROM customers
        WHERE email = :email1

        UNION

        SELECT id, name, email, password, nivel_de_acesso, tipo_usuario
        FROM employees
        WHERE email = :email2

        LIMIT 1
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email1' => $email,
        ':email2' => $email,
    ]);

    return $stmt->fetch();
}

?>
