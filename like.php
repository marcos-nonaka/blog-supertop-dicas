<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $BD = "blog";

    $conexao = mysqli_connect($host, $usuario, $senha, $BD) or
        die("Não foi possível conectar ao banco de dados.");
        echo "Conectado com sucesso ao BD!";

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "UPDATE dicas SET contador = contador + 1 WHERE id = $id";
    $resultado = mysqli_query($conexao, $query);

    header("location: index.php#dicas-publicadas");
?>