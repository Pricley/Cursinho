<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Sair</title>
</head>
<body>
    <?php
        session_start();
        unset($_SESSION['usuario']);
    ?>    
    <a href="index.php">Volta para a página principal</a>
</body>
</html>