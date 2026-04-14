<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>Resultado array e operações</header>
    <main>
        <?php
        $value1 = $_POST['value1'];
        $value2 = $_POST['value2'];
        $value3 = $_POST['value3'];
        $value4 = $_POST['value4'];
        $value5 = $_POST['value5'];

        $values = [$value1, $value2, $value3, $value4, $value5];
        foreach($values as $value){
            echo "O resultado é: " . htmlspecialchars($value, ENT_QUOTES, "UTF-8") . "<br>";

        }
        // O foreach é uma estrutura interativa, que vai iterando a cada item do arrays, sem precisar criar um indice para acessar cada item
        // É importante ressaltar que o foreach apenas lê os dados. Para modificar os dados, é necessário usar o array original
        // se utilizando de um &. Ex:
        echo "<br><br>";

        foreach($values as &$value){
            $value = $value * 0.5;
            echo "O resultado é: " . htmlspecialchars($value, ENT_QUOTES, "UTF-8") . "<br>";
        }
        unset($value); // é necessário usar o unset para evitar que a variável $value continue a ser uma referência para o último item do array
        //o que pode causar problemas se for usada posteriormente no código
        
        ?>
    </main>
</body>
</html>