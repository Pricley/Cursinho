<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Matricular</title>
</head>
<body>
    <?php
        $id_curso = $_GET["id_curso"];
        $id_aluno = $_GET["id_aluno"];

        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Inclui dados na tabela matriculas
        $sql = "INSERT INTO matriculas (id_aluno,id_curso) VALUE ('$id_aluno','$id_curso')";
        // echo $sql;

        if(mysqli_query($conexao, $sql)){
            echo "Matrícula realizada com sucesso";
        } else {
            echo "Erro ao realizar matrícula";
        };
        
        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
    <p><a href="listar_cursos.php">Volta para página dos cursos</a>
    <p><a href="index.php">Volta para página principal</a>
</body>
</html>