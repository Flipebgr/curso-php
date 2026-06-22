<?php
session_start();

require_once __DIR__ . "/conexion.php";

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    echo "Preencha todos os campos.";
    exit;
}

function loginEncontrado(array $registro, string $username, array $campos): bool {
    foreach ($campos as $campo) {
        if (isset($registro[$campo]) && $registro[$campo] === $username) {
            return true;
        }
    }

    return false;
}

function iniciarSessao(array $usuario, string $tipo): void {
    $_SESSION["usuario"] = $usuario["name"];
    $_SESSION["nivel"] = (int) $usuario["nivel_de_acesso"];
    $_SESSION["tipo_usuario"] = $tipo;
    $_SESSION["id"] = $usuario["id"];
}

$pdo = conectarBanco();
$customers = buscarCustomers($pdo);
$employees = buscarEmployees($pdo);

foreach ($customers as $customer) {
    if (loginEncontrado($customer, $username, ["user", "name", "email"])) {
        if (!password_verify($password, $customer["password"])) {
            echo "Usuario ou senha incorreta. Tente novamente.";
            exit;
        }

        if ((int) $customer["nivel_de_acesso"] === 1) {
            iniciarSessao($customer, "customer");
            header("Location: ../pages/customer.php");
            exit;
        }

        echo "Nivel de acesso invalido para cliente.";
        exit;
    }
}

foreach ($employees as $employee) {
    if (loginEncontrado($employee, $username, ["name", "email"])) {
        if (!password_verify($password, $employee["password"])) {
            echo "Usuario ou senha incorreta. Tente novamente.";
            exit;
        }

        $nivelDeAcesso = (int) $employee["nivel_de_acesso"];

        if ($nivelDeAcesso === 2) {
            iniciarSessao($employee, "employee");
            header("Location: ../pages/employee.php");
            exit;
        }

        if ($nivelDeAcesso === 3) {
            iniciarSessao($employee, "admin");
            header("Location: ../pages/admin.php");
            exit;
        }

        echo "Nivel de acesso invalido para funcionario.";
        exit;
    }
}

echo "Usuario ou senha incorreta. Tente novamente.";
exit;
?>
