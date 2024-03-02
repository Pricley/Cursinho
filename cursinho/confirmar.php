<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Confirmar inscrição</title>
</head>
<body>
    <?php
        // Recebe os dados do formulário de inscrição
        $id_evento = $_POST["id_evento"];
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];

        // Conexão com o banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "cursinho";

        $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

        // Inclui dados na tabela participantes
        $sql = "INSERT INTO participantes (nome,telefone,email) VALUE ('$nome','$telefone','$email')";
        // echo $sql;

        // Insere dados do participante
        if(mysqli_query($conexao, $sql)){
            echo "Dados do participante inseridos com sucesso.<br>";
        
            // Obter id do participante
            $sql = "SELECT id FROM participantes WHERE email='$email'";
            $resultado = mysqli_query($conexao, $sql);
            if ($participante=mysqli_fetch_array($resultado)){ // Participante encontrado
                $id_participante = $participante['id'];

                // Inseri dados na tabela inscricao
                $sql = "INSERT INTO inscricoes (id_evento,id_participante) VALUE ('$id_evento','$id_participante')";
                // echo $sql;
                if(mysqli_query($conexao, $sql)){
                    echo "Inscrição realizada com sucesso.<br>";
                } else {
                    echo "Erro na iscrição. ";
                }
            } else {
                echo "Erro ao consultar participante. ";
            }

        } else {
            echo "Erro ao inserir os dados do participante. ";
        };
        

        // Fecha a conexão com o banco
        mysqli_close($conexao);
    ?>
</body>
</html>