<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
</head>
<body>
    <?php

        $id = $_GET["id"];

        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Consulta dados na tabela alunos
        $sql = "DELETE FROM alunos WHERE id=$id";
        // echo $sql;

        if(mysqli_query($conexao, $sql)){
            echo "Aluno excluído com sucesso";
        } else {
            echo "Erro ao excluir aluno";
        };
        
        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
    <p><a href="listar_cursos.php">Volta para página dos cursos</a>
    <p><a href="index.php">Volta para página principal</a>
</body>
</html>