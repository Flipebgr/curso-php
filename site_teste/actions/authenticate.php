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
// O Require_once é uma função do php que é usadada para incluir um arquivo(um código, uma lista e etc) em outro arquivo.
// Ele garante que o arquivo é extremamente necessário para o funcionamento do código, ou seja, se o arquivo não for encontrado, o código irá parar de funcionar e exibir um erro fatal. Além disso, o require_once garante que o arquivo seja incluído apenas uma vez, evitando erros de redeclaração de variáveis ou funções. No caso do código acima, ele é usado para incluir os arquivos que contêm os dados dos clientes e funcionários, que são necessários para a autenticação do usuário.
// Além disso, _once no final significa que ele só permite ser chamado uma vez, ou seja, se o arquivo já tiver sido incluído anteriormente, ele não será incluído novamente, evitando erros de redeclaração de variáveis ou funções. Isso é importante para garantir que o código funcione corretamente e evite conflitos entre diferentes partes do código.
// O código acima é responsável por pegar os dados do cliente e do funcionário, para que possa ser feita a autenticação do usuário. Ele utiliza o require_once para garantir que os arquivos sejam incluídos apenas uma vez, evitando erros de redeclaração de variáveis ou funções.
// A diferença do require para o include é que o require para a execução inteira se o arquivo tiver erro, ou não for executada.
// O include, por outro lado, apenas exibe um aviso de erro e continua a execução do código
// Mesmo que o arquivo não seja encontrado ou tenha erros. Portanto, o require é mais adequado para arquivos que são essenciais para o funcionamento do código, enquanto o include pode ser usado para arquivos que são opcionais ou que não são críticos para a execução do código.
// (./) Um ponto você está na mesma pasta
//(../) Dois pontos você volta uma pasta

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
            $_SESSION["id"] = $customer["id"];
            header("Location: ../pages/customer.php"); 
            exit;
        } else {
            // achou o nome mas senha errada
            echo " Usuário ou senha incorreta. Tente novamente.";
            exit;
        }
    }
} 
foreach ($employees as $employee) {
    if ($username == $employee["name"] && password_verify($password, $employee["password"]) && $employee["nivel_acesso"] == "employee") {
        $_SESSION["usuario"] = $employee["name"];
        $_SESSION["nivel"]   = "employee";
        $_SESSION["id"] = $employee["id"];
        header("Location: ../pages/employee.php");
        exit;
    }elseif ($username == $employee["name"] && !password_verify($password, $employee["password"])) {
        // achou o nome mas senha errada
        echo " Usuário ou senha incorreta. Tente novamente.";
        exit;
    }
}

foreach ($employees as $employee) {
    if ($username == $employee["name"] && password_verify($password, $employee["password"]) && $employee["nivel_acesso"] == "admin"){
        $_SESSION["usuario"] = $employee["name"];
        $_SESSION["nivel"]   = "admin";
        $_SESSION["id"] = $employee["id"];
        header("Location: ../pages/admin.php");
        exit;

    }elseif ($username == $employee["name"] && !password_verify($password, $employee["password"])) {
        // achou o nome mas senha errada
        echo " Usuário ou senha incorreta. Tente novamente.";
        exit;
    }
}

header("Location: ../pages/register.php");
// Futuramente isso ira virar um botão, onde o cliente clica para se cadastrar, e não irá redirecionar automaticamente para a página de cadastro, mas por enquanto, para fins de teste, ele irá redirecionar automaticamente para a página de cadastro caso o usuário não tenha uma conta ou tenha digitado um nome de usuário ou senha incorretos.
// Dessa forma, o usuário será redirecionado para a página de login, onde lá irá ter o botão de cadastro, e caso ele clique,
// irá redirecionar para a página de cadastro, onde ele irá preencher os campos necessários para se cadastrar, e após isso, ele irá redirecionar para a página de login novamente, onde ele irá digitar o nome de usuário e senha que ele acabou de criar, e caso esteja correto, ele irá redirecionar para a página de dashboard do cliente ou funcionário.
// Caso ele não clique, mas entre com um usuário ou senha inexistentes, ele será redirecionado para o cadastro, onde ele irá preencher os campos necessários para se cadastrar, e após isso, ele irá redirecionar para a página de login novamente, onde ele irá digitar o nome de usuário e senha que ele acabou de criar, e caso esteja correto, ele irá redirecionar para a página de dashboard do cliente ou funcionário, dependendo do nível de acesso que ele escolheu ao se cadastrar.
// O nível de acesso é pré-definido para o cliente, independente do cadastro. Apenas que tem o nível de acesso que é adicionado na mão é a do funcionári e do admin
exit;


?>