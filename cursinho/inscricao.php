<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição</title>
</head>
<body>
    <?php
        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";
        
        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Consulta dados na tabela eventos
        $sql = "SELECT titulo FROM eventos WHERE situacao='A'";
        // echo $sql;
        
        $resultado = mysqli_query($conexao, $sql);
        if ($evento=mysqli_fetch_array($resultado)){ // Existe evento ativo (situacao='A')
            echo "Evento: $evento[titulo]";
            ?>
            <form action="confirmar.php" method="POST">
                <label for="Nome">Nome:</label><br>
                <input type="text" id="Nome" name="Nome"><br>
                <label for="telefone">Telefone:</label><br>
                <input type="text" id="telefone" name="telefone"><br>
                <label for="email">e-mail:</label><br>
                <input type="text" id="email" name="email"><br>
                <input type="submit">
            </form>
            <?php
        } else { // Não existe evento ativo
            echo 'Nenhum evento encontrado';
        }
    ?>
</body>
</html>