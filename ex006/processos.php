<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>Estrutura de repetição while</header>
    <?php 
    $count = 0;
    $tabuada = $_POST["tabuada"] ?? null;
    
    
    while($count<=10){
        echo "$tabuada x $count =" . ($tabuada * $count);
        echo "<br>"; 
        $count++;
    }

    
    
    ?>
</body>
</html>