<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultados</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
   <header>Resultado do formulário pet </header>

    <main>
    <?php

   $tipo_de_acesso = $_POST["acesso"] ?? null;
   $lista_de_funcionarios = [];
   $lista_de_pets = [];

   if($tipo_de_acesso == 1) {
      echo "seja bem vindo cliente, aqui você pode castrar seu pet, comprar produtos, ter pet-shop e muito mais";
   }elseif($tipo_de_acesso == 2){
      echo "seja bem vindo funcionário, aqui você pode gerenciar o pet-shop e realizar diversas atividades";

      
   }else{
      echo "Errto: Tipo de acesso inválido, insira novamente";
   }







    //Get captando os valores do formulário
    $nome_pet = $_POST["NomePet"] ?? null; 
    $id_pet = $_POST["IdDoPet"] ?? null;
    $data_nascimento_pet = $_POST["IdadePet"] ?? null;
    
    //Calculo para descobrir a idade do cachorro com base na data de nascimento do cachorro    
    $dataBR = date("d/m/Y", strtotime($data_nascimento_pet));
    $dataNascimento =new DateTime($data_nascimento_pet);
    $today = new DateTime();
    $diff = $today ->diff($dataNascimento);
    $meses = ($diff->y *12) + $diff ->m;

    // Verificação de valores vazios 
    if( 
       empty($nome_pet) ||
       !is_numeric($id_pet) ||
       empty($data_nascimento_pet) 
    ) {
       echo "Erros: Dados inválidos, insira novamente";
       exit; 
    }

    echo "<p1>Seja bem vindo ao pet-shop raposo, $nome_pet <br></p1>";
    echo "<p1>Seus dados são RG:$id_pet e a idade é:$meses meses </p1>";
     ?>


    </main>
</body>
</html>


