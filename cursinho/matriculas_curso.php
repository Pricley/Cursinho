<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar matrículas</title>
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
        echo "<p>$curso[descricao]";
        $descricao = $curso['descricao'];

        // Consulta dados de alunos matriculados

        $sql = "SELECT id,nome FROM alunos,matriculas WHERE alunos.id=id_aluno AND id_curso=$id";
        $resultado = mysqli_query($conexao, $sql);

        echo "<p>Alunos matriculados:";
        echo "<table>";
        while ($aluno=mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>$aluno[id]</td>";
            echo "<td>$aluno[nome]</td>";
            echo "<td><a href='excluir_matricula.php?id_curso=$id&id_aluno=$aluno[id]'>Remover</a></td>";
            echo "</tr>";
        }
        echo "</table></p>";

        // Lista alunos cadastrados

        $sql = "SELECT id,nome FROM alunos";
        $resultado = mysqli_query($conexao, $sql);

        echo "<p>Alunos cadastrados:";
        echo "<table>";
        while ($aluno=mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>$aluno[id]</td>";
            echo "<td>$aluno[nome]</td>";
            echo "<td><a href='incluir_matricula.php?id_curso=$id&id_aluno=$aluno[id]'>Matricular</a></td>";
            echo "</tr>";
        }
        echo "</table></p>";

        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
    <p><a href="listar_cursos.php">Volta para página dos cursos</a>
    <p><a href="index.php">Volta para página principal</a></body>
</html>        