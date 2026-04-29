<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../Pet_shop_website/public/style.css">
</head>
<body>
    <h1>Seja bem vindo ao nosso pet-shop</h1>
    <h2>Faça o login para acessar o site</h2>
    <form action="../Pet_shop_website/actions/authenticate.php" method="post">
        <label for="username">Usuário</label>
        <input type="text" name="username" id="username">

        <label for="password">Senha</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Entrar">
    </form>
    <h2>se você não tem uma conta, <a href="../Pet_shop_website/pages/register.php">cadastre-se</a></h2>

    
</body>
</html>

    