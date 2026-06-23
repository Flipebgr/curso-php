<?php
session_start();

require_once __DIR__ . "/conexion.php";

$email = trim($_POST["username"] ?? ""); //trim faz a limpeza inicial e final da string, removendo espaços em branco, quebras de linha, etc.
$password = $_POST["password"] ?? "";

if ($email === "" || $password === "") {
    echo "Preencha todos os campos.";
    exit;
}

const REDIRECIONAMENTOS = [
    1 => '../pages/customer.php',
    2 => '../pages/employee.php',
    3 => '../pages/admin.php',
];


function iniciarSessao(array $usuario): void {
    // Tudo vem do BD 
    $_SESSION['usuario']       = $usuario['name'];
    $_SESSION['nivel']         = (int) $usuario['nivel_de_acesso'];
    $_SESSION['tipo_usuario']  = $usuario['tipo_usuario']; // vem do BD agora
    $_SESSION['id']            = $usuario['id'];
}

// --- Fluxo principal ---
$pdo     = conectarBanco();
$usuario = buscarUsuarioPorLogin($pdo, $email);

// Usuário não existe
if (!$usuario) {
    // Mensagem genérica: não revele se foi o usuário ou a senha que falhou
    // (OWASP recomenda isso para evitar enumeração de usuários)
    echo "Usuário ou senha incorretos. Tente novamente.";
    exit;
}

// Senha incorreta
if (!password_verify($password, $usuario['password'])) {
    echo "Usuário ou senha incorretos. Tente novamente.";
    exit;
}

$nivel = (int) $usuario['nivel_de_acesso'];

// Nível não mapeado (dado inválido no BD)
if (!isset(REDIRECIONAMENTOS[$nivel])) {
    error_log("Login: nivel_de_acesso inválido para usuário ID " . $usuario['id']);
    echo "Erro de configuração. Contate o administrador.";
    exit;
}

// Tudo válido: inicia sessão e redireciona
iniciarSessao($usuario);
header("Location: " . REDIRECIONAMENTOS[$nivel]);
exit;
?>
