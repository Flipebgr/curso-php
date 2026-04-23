<?php
require_once '../data/customer.php';
session_start();

function validarFormulario(array $dados): array {
    $errros = [];

    if (empty(trim($dados["name"] ?? ""))) {
        $errros[] = "Nome é obrigatório.";
    }
    if (!filter_var($dados["email"] ?? "", FILTER_VALIDATE_EMAIL)) {
        $errros[] = "E-mail inválido.";
    }
    if (strlen($dados["password"] ?? "") < 8) {
        $errros[] = "Senha deve ter ao menos 8 caracteres.";
    }
    return $errros;
}

$erros = validarFormulario($_POST);

if (!empty($erros)) {
    $_SESSION['erros'] = $erros;
    header("Location: ../register");
    exit;
}else {
    $customers[] = $novo_cliente;
    echo "Cliente registrado com sucesso!";
    header("Location: ../access");
    exit;
}

$novo_cliente = [
    'name'         => htmlspecialchars(trim($_POST['name']),  ENT_QUOTES, 'UTF-8'),
    'email'        => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
    'password'     => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'nivel_acesso' => 'customer',
    'id'           => count($customers) + 1,
];

$customers[] = $novo_cliente;

header('Location: ../access');
exit;

?>
