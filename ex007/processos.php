<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>Resultado array</header>
    <main>
    <?php
    $var1 = $_POST["valor_indice_1"];
    $var2 = $_POST["valor_indice_2"];

    $nomes = [$var1,$var2];      

    print_r($nomes);
    
?>
    </main>

</body>
</html>


