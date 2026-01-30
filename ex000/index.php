<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendendo php</title>
</head>
<body>
    <h1>
    Primeira página web com Html + php!
    </h1>
    <h2>Servidor web de Filipe Menezes </h2>
    
    <h3>FORMULÁRIO BÁSICO
        <br>
    <form method="POST">
        <input type="number" name="CPF" placeholder="Digite seu cpf (sem ponto)">
        <br><br>
        <button type="submit">enviar</button>
    </form>
        <?php 
        if ($_POST){
            $cpf = $_POST['CPF'];
            print "Seu CPF é: $cpf";
        }
        
        ?>
    </h3>
    <p> </p>
</body>
</html>