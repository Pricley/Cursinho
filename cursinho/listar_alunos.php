<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar alunos</title>
</head>
<body>
    <?php
        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Consulta dados na tabela alunos
        $sql = "SELECT id,nome,email,telefone,responsavel FROM alunos";
        // echo $sql;

        $resultado = mysqli_query($conexao, $sql);

        echo "<table>";
        while ($aluno=mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>$aluno[id]</td>";
            echo "<td>$aluno[nome]</td>";
            echo "<td>$aluno[email]</td>";
            echo "<td>$aluno[telefone]</td>";
            echo "<td>$aluno[responsavel]</td>";
            echo "<td><a href='editar_aluno.php?id=$aluno[id]'>Editar</td>";
            echo "<td><a href='excluir_aluno.php?id=$aluno[id]'>Excluir</td>";
            echo "<td><a href='matriculas_aluno.php?id=$aluno[id]'>Matricular</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
    <p><a href="cadastrar_aluno.php">Inserir novo aluno</a>
    <p><a href="index.php">Volta para página principal</a>
</body>
</html>