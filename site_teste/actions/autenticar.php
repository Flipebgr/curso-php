<<?php 
//require_once "../actions/autenticar.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
if($username == "Filipe" && $password === "F123M"){
    $_SESSION = true;
    header("Location: ../pages/dashboard.php");
    exit;
    //header() é uma função que envia cabeçalhos HTTP para o navegador.
} else{
    echo "Usuário ou senhas incorretos, verifique e tente novamente!";
}


?>