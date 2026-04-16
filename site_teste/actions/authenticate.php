<?php 
session_start();
echo "Autenticando usuário...";
//require_once "../actions/autenticar.php";
//1° Pega os dados de customer/data/customer.php
//2° Verifica se o username existe e se a senha é correta
//3° Se for correto, redireciona para a página de dashboard de seu respctivo nível de acesso
//Admin, customer, employee
//4° Caso não tenha conta -> pede para se cadastrar no site
//5° Manda para register.php

require_once "../customer/data/customer.php";
require_once "../employee/data/employee.php";
// O código acima é responsável por pegar os dados do cliente e do funcionário, para que possa ser feita a autenticação do usuário. Ele utiliza o require_once para garantir que os arquivos sejam incluídos apenas uma vez, evitando erros de redeclaração de variáveis ou funções.
// (./) Um ponto você está na mesma pasta
//(../) Dois pontos você volta uma pasta

//$customer = require_once "../customer/data/customer.php";
//$employee = require_once "../employee/data/employee.php";
$username = $_POST["username"] ?? null;
$password = $_POST["password"] ?? null;

if (!$username || !$password) {
    echo "Preencha todos os campos.";
    exit;
}
foreach ($customers as $customer) {
    if ($username == $customer["name"]) {        // 1° achou o nome
        if (password_verify($password, $customer["password"])) {  // 2° verifica a senha
            $_SESSION["usuario"] = $customer["name"];
            $_SESSION["nivel"]   = $customer["nivel_acesso"];

            if ($customer["nivel_acesso"] == "admin") {
                header("Location: ../pages/admin.php");
            } else {
                header("Location: ../pages/customer.php");
            }
            exit;
        } else {
            // achou o nome mas senha errada
            echo "Senha incorreta. Tente novamente.";
            exit;
        }
    }
} 
foreach ($employees as $employee) {
    if ($username == $employee["name"] && password_verify($password, $employee["password"])) {
        $_SESSION["usuario"] = $employee["name"];
        $_SESSION["nivel"]   = "employee";
        header("Location: ../pages/employee.php");
        exit;
    }
}

header("Location: ../pages/register.php");
exit;


?>