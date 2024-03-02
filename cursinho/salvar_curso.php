<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Editar curso</title>
</head>
<body>
    <?php
        $id = $_POST["id"];
        $descricao = $_POST["descricao"];

        // echo "$nome<p> $email<p> $telefone <p>";

        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Altera dados na tabela cursos
        $sql = "UPDATE cursos SET descricao='$descricao' WHERE id=$id";
        // echo $sql;

        if(mysqli_query($conexao, $sql)){
            echo "Dados de $descricao alterados com sucesso";
        } else {
            echo "Erro ao alterar os dados de $descricao";
        };

        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
    <p><a href="listar_cursos.php">Volta para página dos cursos</a>
    <p><a href="index.php">Volta para página principal</a>
</body>
</html>