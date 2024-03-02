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

        // Consulta dados na tabela alunos
        $sql = "SELECT id,nome FROM alunos WHERE id=$id";
        // echo $sql;

        $resultado=mysqli_query($conexao, $sql);
        $aluno=mysqli_fetch_array($resultado);
        echo "<p>$aluno[nome]";
        $nome = $aluno['nome'];

        // Consulta dados de cursos matriculados

        $sql = "SELECT id,descricao FROM cursos,matriculas WHERE cursos.id=id_curso AND id_aluno=$id";
        $resultado = mysqli_query($conexao, $sql);

        echo "<p>Cursos matriculados:";
        echo "<table>";
        while ($curso=mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>$curso[id]</td>";
            echo "<td>$curso[descricao]</td>";
            echo "</tr>";
        }
        echo "</table></p>";

        // Lista cursos cadastrados

        $sql = "SELECT id,descricao FROM cursos";
        $resultado = mysqli_query($conexao, $sql);

        echo "<p>Cursos cadastrados:";
        echo "<table>";
        while ($curso=mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>$curso[id]</td>";
            echo "<td>$curso[descricao]</td>";
            echo "<td><a href='incluir_matricula.php?id_curso=$curso[id]&id_aluno=$id'>Matricular</a></td>";
            echo "</tr>";
        }
        echo "</table></p>";

        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
    <p><a href="listar_cursos.php">Volta para página dos cursos</a>
    <p><a href="index.php">Volta para página principal</a></body>
</html>        