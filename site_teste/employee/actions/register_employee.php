<?php
require_once "../data/employee.php;";
$novo_funcionario = [
    'name' => $_POST['name'] ?? null,
    'email'-> $_POST['email'] ?? null,
    'password' => !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null,
    'nivel_acesso' => 'employee',
    'id' => count($employees) + 1
]

?>