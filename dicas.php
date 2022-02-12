<?php
    $titulo = $_POST["titulo"];
    $dica = $_POST["dica"];

    if(empty($titulo) || empty($dica)) {
        echo "Algum campo está vazio!";
    } else {

    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $BD = "blog";

    $conexao = mysqli_connect($host, $usuario, $senha, $BD) or
        die("Não foi possível conectar ao banco de dados.");
        echo "Conectado com sucesso ao BD!";

    $query = "INSERT INTO dicas VALUES('', '$titulo', '$dica', '')";
    $resultado = mysqli_query($conexao, $query);

    header("location: index.php#dicas-publicadas");
    }
?>