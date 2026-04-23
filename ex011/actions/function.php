<?php
$value1 = $_POST["value1"] ?? null;
$value2 = $_POST["value2"] ?? null;

if (!$value1 || !$value2) {
    echo "Preencha todos os campos.";
    exit;
}

function sum($var1, $var2) {
    return $var1 + $var2;
}

function multiply($var1, $var2) {
    return $var1 * $var2;
}

function toDivide ($var1, $var2) {
    if ($var2 == 0) {
        return "Não é possível dividir por zero.";
    }
    return $var1 / $var2;
}

function factorial($var1){
    if ($var1 < 0){
        echo "Não existe o fatorial de um número negativo.";
    } elseif ($var1 == 0 || $var1 == 1){
        return 1;
    }else {
      return $var1 * factorial($var1 - 1);
    }
}   

$factorial_number1 = factorial($value1);
$factorial_number2 = factorial($value2);
echo "Fatorial de $value1 é: $factorial_number1<br>";
echo "Fatorial de $value2 é: $factorial_number2<br>";


//Uma coisa importante é que, se usar passagem por referencia (&$var), a variável original será modificada, e não apenas a cópia da variável. Por exemplo, se eu fizer uma função que recebe um número e multiplica ele por 2, e eu passar a variável por referência, a variável original será modificada, e não apenas a cópia da variável. Então, se eu fizer isso:
    
?>
