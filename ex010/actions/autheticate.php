<?php
session_start();
if(isset($_SESSION['user'])){
    echo "Bem Vindo, " . $_SESSION['user']['name'];
    echo "<br>";
    echo "Seu email cadastrado é: " . $_SESSION['user']['email'];
    echo "<br>";
    echo session_id();

}





?>