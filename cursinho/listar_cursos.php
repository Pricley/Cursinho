<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar cursos</title>
</head>
<body>
    <?php
        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Consulta dados na tabela cursos
        $sql = "SELECT id, descricao FROM cursos";
        // echo $sql;

        $resultado = mysqli_query($conexao, $sql);

        echo "<table>";
        while ($curso=mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>$curso[id]</td>";
            echo "<td>$curso[descricao]</td>";
            echo "<td><a href='editar_curso.php?id=$curso[id]'>Editar</td>";
            echo "<td><a href='excluir_curso.php?id=$curso[id]'>Excluir</td>";
            echo "<td><a href='matriculas_curso.php?id=$curso[id]'>Matricular</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
    <p><a href="cadastrar_curso.php">Inserir novo curso</a>
    <p><a href="index.php">Volta para página principal</a>
</body>
</html>