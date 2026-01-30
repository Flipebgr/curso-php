<!DOCTYPE html>
<html lang = "Pt-br">
<head>
    <meta charset = "UTF-8">
    <meta name= "viewport" content="width=device-width, initial scale=1.0">
    <title>Ex 003</title>
</head>
<body>
    <h1>Variáveis e constantes</h1>
    <?php 
    $name = "Filipe";
    $lastname = "Menezes";
    
    const Curso = "Sistemas de informação";
    // A constante "curso" é inalterável depois de ser definida

    $faculdade = "UFPa - Universidade Federal do Estado do Pará";
    echo "Parábens $name $lastname, você foi aprovado na  $faculdade <br>";
    echo "ALUNO: $name $lastname" . "<br> CURSO:".Curso;
    ?>


</body>

</html>