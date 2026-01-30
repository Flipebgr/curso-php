<!DOCTYPE html>
<html lang = "pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> server teste </title>
</head>
<body>
<h1>Formulário teste</h1>
<p> <?php 
    $name = "Filipe";
    echo "Seja Bem vindo $name<br>";
    echo "-------------------------------------------------------------";
    date_default_timezone_set("America/Sao_Paulo");
    echo "<br> hoje é dia: " . date('d/M/Y');  
    echo "<br>E atualmente são " . date("G:i:s");
?>  </p>
    <form method="POST">
        <input type="text" name="CPF" placeholder="Digite seu CPF(digite sem ponto)">
        <br><br>
        <button type="submit">Enviar formulário</button>
    </form>

     <?php include "processos.php"?>
</body>
</html>