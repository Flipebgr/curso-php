<?php
session_start();
require_once __DIR__ . "/../../actions/conexion.php";

function validarFormulario(array $dados): array {
    $erros = [];

    if (empty(trim($dados["name"] ?? ""))) {
        $erros[] = "Nome é obrigatório.";
    }

    if (empty(trim($dados["user"] ?? "" || strlen(trim($dados["user"] ?? "")) < 8))) {
        $erros[] = "User é obrigatório e deve ter ao menos 8 caracteres.";
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
    'user'             => trim($_POST['user']),
    'email'            => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
    'password'         => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'nivel_de_acesso'  => 1
];

//  Aqui vai ser salvar no banco
$pdo = conectarBanco();

function criarUsuario(PDO $pdo, string $name, string $user, string $email, string $passwordHash, int $nivel_de_acesso): bool {
    $sql  = "INSERT INTO customer (name, user, email, password, nivel_de_acesso) VALUES (:name, :user, :email, :password, :nivel_de_acesso)";
    $stmt = $pdo->prepare($sql);

    return $stmt->execute([  
        ':name'  => $name,
        ':user' => $user,
        ':email' => $email,
        ':password' => $passwordHash,
        ':nivel_de_acesso' => $nivel_de_acesso
    ]);

}

criarUsuario($pdo, 
$novo_cliente['name'], 
$novo_cliente['user'], 
$novo_cliente['email'], 
$novo_cliente['password'], 
$novo_cliente['nivel_de_acesso']);

$_SESSION['sucesso'] = "Cliente registrado com sucesso!";
header("Location: ../../access.php");
exit;
?>