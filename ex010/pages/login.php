<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>
<body>
    <?php 
    session_start();
    $_SESSION['user'] = [
        'name' => 'Filipe',
        'email' => 'filipe@gmail.com'];

    header("Location: ../actions/autheticate.php");
    ?>
</body>
</html>