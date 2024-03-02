<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar inscrições nos eventos</title>
</head>
<body>
    <?php
        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Consulta dados das inscrições nos eventos
        $sql = "SELECT e.titulo AS Evento,p.nome AS Participante,p.email ". 
               "FROM eventos e,participantes p,inscricoes i ". 
               "WHERE id_evento = e.id AND id_participante = p.id";
        // echo $sql;

        $resultado = mysqli_query($conexao, $sql);

        echo "<table>";
        while ($inscricao=mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>$inscricao[Evento]</td>";
            echo "<td>$inscricao[Participante]</td>";
            echo "<td>$inscricao[email]</td>";
            /*
            echo "<td><a href='editar_inscricao.php?id=$inscricao[id]'>Editar</td>";
            echo "<td><a href='excluir_inscricao.php?id=$inscricao[id]'>Excluir</td>";
            echo "<td><a href='matriculas_inscricao.php?id=$inscricao[id]'>Matricular</td>";
            */
            echo "</tr>";
        }
        echo "</table>";

        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
    <p><a href="index.php">Volta para página principal</a>
</body>
</html>