<?php
require_once '../data/customer.php';
$novo_cliente = [
    'name' => $_POST['name'] ?? null,
    'email' => $_POST['email'] ?? null,
    'password' => !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null,
    'nivel_acesso' => 'customer',
    'id' => count($customers) + 1
];
 
$customers[] = $novo_cliente;
echo "Cliente registrado com sucesso!";
header("Location: ../pages/register.php");
?>
