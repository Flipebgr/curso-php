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
        $escolha = $_POST["escolha"];
        // Retorno do formulário com a escolha da operação pelo usuário
    
        $valores= [$_POST["value1"], $_POST["value2"], $_POST["value3"]];
        //Definição de uma array com os valores, para manipular melhor


        $soma = $value1 + $value2 + $value3;
        $subtracao = $value1 - $value2 - $value3;
        $multiplicacao = $value1 * $value2 * $value3;
        $exponenciacao = ($value1 ** 2) + ($value2 ** 2) + ($value3 ** 2);
        $divisao = $value1 / $value2;
        $mod = $value1 % $value2;

if($escolha == 1 ){
        if( empty($value1) || !isset($value2) || $value2 == '' || empty($value3) ){
            // A exclamação (!) antes do isset é usada para verificar se a variável não existe OU se ela existe, mas está vazia.
            // A diferença para o empty é que o empty verifica se uma variável é vazia ->
            echo "Erro: Os dados são inválidos, não se pode deixar os valores vazios <br>";
            echo "Insira valores válidos e tente novamente";
            } else {

                if ($value2 == 0) {
                    echo "Erro: Não é possível dividir por zero. <br>";
                    echo "Insira valores válidos e tente novamente <br>";
                } else {
                    echo "A soma dos valores é: $soma <br>";
                    echo "A subtração dos valores é: $subtracao <br>";
                    echo "A multiplicação dos valores é: $multiplicacao <br>";
                    echo "A exponenciação dos valores é: $exponenciacao <br>";
                    echo "A divisão dos valores é: $divisao <br>";
                    echo "O módulo dos valores é: $mod <br>";
                    } 
        }
} elseif($escolha == 2){
        echo "A função abs() serve para retornar o valor absoluto de um número. O valor absoluto de $subtracao é:" . abs($subtracao) . "<br>";
        echo "A função round() serve para arredondar um número. O valor arredondado de $divisao é:" . round($divisao, 2) . "<br>";
        echo "A função floor() serve para arredondar um número para baixo. O valor arredondado para baixo de $multiplicacao é:" . floor($multiplicacao) . "<br>";
        echo "A função ceil() serve para arredondar um número para cima. O valor arredondado para cima de $multiplicacao é:" . ceil($multiplicacao) . "<br>";
        echo "A função sqrt() serve para retornar a raiz quadrada de um número. A raiz quadrada de $soma é:" . sqrt($soma) . "<br>";
        $max = max($valores);
        $min = min($valores);

        echo "A função max() serve para retornar o maior valor de um array. O maior valor entre $valores é: $max <br>";   
        echo "A função min() serve para retornar o menor valor de um array. O menor valor entre $valores é: $min <br>";
}
        ?>
</body>
</html>