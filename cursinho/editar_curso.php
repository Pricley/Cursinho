<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar curso</title>
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

        // Consulta dados na tabela cursos
        $sql = "SELECT id,descricao FROM cursos WHERE id=$id";
        // echo $sql;

        $resultado=mysqli_query($conexao, $sql);
        $curso=mysqli_fetch_array($resultado);
        // echo "<p>$curso[id] - $curso[descricao]";
        $descricao = $curso['descricao'];

        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>

    <form method="POST" action="salvar_curso.php">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <label for="descricao">Curso:</label><br>
        <input type="text" id="descricao" name="descricao" value="<?php echo $descricao ?>"><br>
        <input type="submit" value="Alterar">
    </form>
    <p><a href="listar_cursos.php">Volta para página dos cursos</a>
    <p><a href="index.php">Volta para página principal</a></body>
</html>