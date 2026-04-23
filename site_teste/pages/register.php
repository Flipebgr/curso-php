<?php
session_start();
$erros = $_SESSION['erros'] ?? [];
unset($_SESSION['erros']);

?>







<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Registro</title>
</head>
<body>
    <h1>Seja bem vindo à página de registro</h1>

    <?php if (!empty($erros)): ?>
        <div style="background: #ffe0e0; border: 1px solid red; padding: 10px; border-radius: 5px;">
            <?php foreach ($erros as $erro): ?>
                <p style="color: red; margin: 4px 0;">⚠️ <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
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