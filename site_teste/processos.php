<?php 
if ($_POST){
    $nome = $_POST['CPF'];
    $tamanho = strlen((string)$nome);
    if ($tamanho != 11) {
        echo "valor inválido! o CPF deve conter 11 digítos";
    } else {
    print "Com base no CPF: $nome";
    echo "<br> Encontramos os seguintes dados <br> RG:8566712 <br> Numero: 91988342561 <br>";
    }
    
}?>