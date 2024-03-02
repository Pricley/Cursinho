<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação</title>
</head>
<body>
    <?php
        $form_usuario = $_POST["usuario"];
        $form_senha = $_POST["senha"];

        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Consulta dados na tabela usuarios
        $sql = "SELECT nome,login FROM usuarios WHERE login='$form_usuario' AND senha='$form_senha'";
        // echo $sql;

        $resultado = mysqli_query($conexao, $sql);

        session_start();
        if ($usuario=mysqli_fetch_array($resultado)){
            echo 'usuario encontrado <br>';
            // Mostra usuário
            echo "Usuário: $form_usuario<br><p>";

            $_SESSION["usuario"]=$form_usuario;
        } else {
            echo 'usuario não encontrado';
            unset($_SESSION['usuario']);
        }
        
    ?>
    <a href="index.php">Volta para a página principal</a>
</body>
</html>