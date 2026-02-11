<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado formulário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>Resultado do 1° formulário</header>
    <main>
    <?php 
    $name = $_GET["nome"];
    $lastName = $_GET["sobrenome"];

    echo "<p>Nice to meet you, $name $lastName. Welcome</p>";

    ?>     
    </main>
</body>
</html>