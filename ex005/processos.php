<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>Resultado</header>
    <?php 
    
    $valor1 = $_POST["valor1"] ?? null;
    $valor2 = $_POST["valor2"] ?? null ;
    $valor3 = $_POST["valor3"] ?? null;

    //Operações básicas para teste de estruturas de decisão

    $soma = $valor1 +  $valor2 + $valor3;
    $subtracao = ($valor1 - $valor2);
    $multiplicacao = $valor1 + $valor2 + $valor3;
    $divsao = ($valor1 + $valor2)/$valor3;
    
    //Estruturas IFs
    if($soma >= 0) {
        echo " A soma de $valor1 + $valor2 + $valor3 é positiva e é: $soma";
    } else {
        echo " A soma de $valor1 + $valor2 + $valor3 é negativa e é $soma <br>";
    }

    //Estrura switch
    switch($subtracao){
        case 8:
            echo "<br> A subtração dos valores $valor1 - $valor2 é igual a: $subtracao";
            break;
        case 10:
            echo "<br> A subtração dos valores $valor1 - $valor2 é igual a: $subtracao";
            break;
        default:
            echo "<br> A subtração dos valores $valor1 - $valor2 é igual a: MISTÉRIO";
            break;
    }

    //Operador ternário
    $valorDivisao = ($valor2 === 0)?"Divisão inválida - insira um valor diferente de zero":"Divisão válida";

    echo "<br> $valorDivisao";
    ?>



</body>
</html>