<head>
    <link rel="stylesheet" href="../public/style.css">
</head>
    <h1>Seja bem vindo ao nosso pet-shop</h1>
    <h2>Faça o login para acessar o site</h2>
    <form action="../actions/form/authenticate.php" method="post">
        <label for="username">Usuário</label>
        <input type="text" name="username" id="username">

        <label for="password">Senha</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Entrar">
    </form>
    