<?php
session_start();
require_once __DIR__ . "/../../actions/conexion.php";

function validarFormulario(array $dados): array {
    $erros = [];

    if (empty(trim($dados["name"] ?? ""))) {
        $erros[] = "Nome é obrigatório.";
    }

    if (!filter_var($dados["email"] ?? "", FILTER_VALIDATE_EMAIL)) {
        $erros[] = "E-mail inválido.";
    }

    if (strlen($dados["password"] ?? "") < 8) {
        $erros[] = "Senha deve ter ao menos 8 caracteres.";
    }

    return $erros;
}

$erros = validarFormulario($_POST);

if (!empty($erros)) {
    $_SESSION['erros'] = $erros;
    header("Location: ../../pages/register.php");
    exit;
}

$novo_cliente = [
    'name'             => trim($_POST['name']),
    'email'            => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
    'password'         => password_hash($_POST['password'], PASSWORD_DEFAULT),
];

//  Aqui vai ser salvar no banco
$pdo = conectarBanco();

function criarUsuario(PDO $pdo, string $name, string $email, string $passwordHash): bool {
    $sql  = "INSERT INTO customers (name, email, password, nivel_de_acesso) VALUES (:name,:email, :password)";
    $stmt = $pdo->prepare($sql);

    return $stmt->execute([  
        ':name'  => $name,
        ':email' => $email,
        ':password' => $passwordHash,
    ]);

}

criarUsuario($pdo, 
$novo_cliente['name'], 
$novo_cliente['email'], 
$novo_cliente['password']);

$_SESSION['sucesso'] = "Cliente registrado com sucesso!";
header("Location: ../../access.php");
exit;
?>