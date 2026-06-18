<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'pet_shop_website');
define('DB_USER', 'root');
define('DB_PASS', '');

function conectarBanco(): PDO { // O tipo de retorno é PDO, que é a classe usada para manipular conexões com bancos de dados em PHP.
try { $dns = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $pdo = new PDO($dns, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura o PDO para lançar exceções em caso de erros, facilitando a depuração e o tratamento de erros.
        return $pdo;

} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage(); // Brecha de segurança, não exibir detalhes do erro em produção
    // Estou mostrando apenas para teste a aprendizado, mas em um ambiente de produção, é recomendado logar o erro em um arquivo de log e exibir uma mensagem genérica para o usuário.
    exit;
} catch (Exception $e) {
    echo "Erro inesperado: " . $e->getMessage();
    exit;
}
}

function excluirRegistro(PDO $pdo, string $tabela, int $id): bool {
    $sql = "DELETE FROM $tabela WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}



?>