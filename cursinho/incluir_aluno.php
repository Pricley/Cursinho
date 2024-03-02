<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cadastrar aluno</title>
</head>
<body>
    <?php
        $nome = $_POST["descricao"];

        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Inclui dados na tabela cursos
        $sql = "INSERT INTO alunos (descricao) VALUE ('$nome')";
        // echo $sql;

        if(mysqli_query($conexao, $sql)){
            echo "ALuno  $nome inseridos com sucesso";
        } else {
            echo "Erro ao inserir aluno $nome";
        };
        
        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
    <p><a href="listar_alunos.php">Volta para página dos cursos</a>
    <p><a href="index.php">Volta para página principal</a>
</body>
</html>