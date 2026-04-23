<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../site_teste/public/style.css">
</head>
<body>
    <h1>Seja bem vindo ao nosso pet-shop</h1>
    <h2>Faça o login para acessar o site</h2>
    <form action="../site_teste/actions/authenticate.php" method="post">
        <label for="username">Usuário</label>
        <input type="text" name="username" id="username">

        <label for="password">Senha</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Entrar">
    </form>
    
</body>
</html>

    