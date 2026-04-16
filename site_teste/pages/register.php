<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Seja bem vindo à página de registro</h1>
    <h1>Faça o registro para acessar o site</h1>
    <main>
        <form action="../customer/actions/register_customer.php" method="post">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="password">Senha</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Registrar">
        </form>
</body>
</html>