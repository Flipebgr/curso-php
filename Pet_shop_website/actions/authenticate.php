<?php
session_start();

require_once __DIR__ . "/conexion.php";

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    echo "Preencha todos os campos.";
    exit;
}

$pdo = conectarBanco();

function buscarCustomer(PDO $pdo, string $username): ?array {
    $sql = "SELECT id, name, user, password, nivel_de_acesso
            FROM customers
            WHERE user = :username OR name = :username
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);

    $customer = $stmt->fetch();
    return $customer ?: null;
}

function buscarEmployee(PDO $pdo, string $username): ?array {
    $sql = "SELECT id, name, password, nivel_acesso
            FROM employees
            WHERE name = :username
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);

    $employee = $stmt->fetch();
    return $employee ?: null;
}

function nivelCustomer(mixed $nivel): string {
    return "customer";
}

function nivelEmployee(mixed $nivel): string {
    if ($nivel === "admin" || (int) $nivel === 3) {
        return "admin";
    }

    return "employee";
}

function autenticar(array $usuario, string $password): bool {
    return password_verify($password, $usuario["password"] ?? "");
}

function iniciarSessao(array $usuario, string $nivel, string $destino): void {
    $_SESSION["usuario"] = $usuario["name"];
    $_SESSION["nivel"] = $nivel;
    $_SESSION["id"] = $usuario["id"];

    header("Location: $destino");
    exit;
}

$customer = buscarCustomer($pdo, $username);

if ($customer !== null) {
    if (autenticar($customer, $password)) {
        iniciarSessao($customer, nivelCustomer($customer["nivel_de_acesso"] ?? null), "../pages/customer.php");
    }

    echo "Usuario ou senha incorreta. Tente novamente.";
    exit;
}

$employee = buscarEmployee($pdo, $username);

if ($employee !== null) {
    if (autenticar($employee, $password)) {
        $nivel = nivelEmployee($employee["nivel_acesso"] ?? null);
        $destino = $nivel === "admin" ? "../pages/Admin.php" : "../pages/employee.php";

        iniciarSessao($employee, $nivel, $destino);
    }

    echo "Usuario ou senha incorreta. Tente novamente.";
    exit;
}

echo "Usuario ou senha incorreta. Tente novamente.";
exit;
