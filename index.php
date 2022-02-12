<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Supertop Dicas para o seu Fim de Semana</title>
</head>
<body>
    <div class="capa">
        <div class="container">
            <h1 class="titulo">Supertop Dicas para o seu Fim de Semana</h1>
            <p class="explicacao">Olá! Bem-vindo(a) ao blog Supertop Dicas para o seu Fim de Semana! Aqui você poderá enviar dicas interessantes<br>
                do que se fazer em um final de semana. Ou, se você que não tem ideia do que fazer, encontrará dicas de atividades<br>
                divertidas enviadas por outros internautas!</p>
        </div>
    </div>
    <div class="envio-dica">
        <div class="container">
            <h2>Envie a sua superdica </h2>
            <form action="dicas.php" method="post" id="formulario">
                <p>Título (máx.: 40 caracteres): <input type="text" maxlength="40" name="titulo" id="titulo"></p>
                <p>Digite aqui a sua superdica (até 150 caracteres): <br><br><textarea name="dica" cols="30" rows="3" maxlength="150"></textarea></p>
                <input type="submit" value="Publicar">
            </form>
            <hr>
        </div>
    </div>
    <div class="dicas-publicadas" id="dicas-publicadas">
        <div class="container">
            <?php
                try {
                        $conectar = new PDO("mysql:host=localhost;port=3306;dbname=blog;", "root", "");
                } catch(PDOException $e) { 
                    echo 'Falha ao conectar com o banco de dados: ' . $e->getMessage();
                }
                try {
                    $consulta = $conectar->query("SELECT * FROM dicas ORDER BY contador DESC");
                    echo "<h2>Confira as superdicas de outros usuários</h2>";
                    echo "<table><tr><th>Título</th><th>Superdica</th><th>Likômetro</th></tr>";
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr><td>$linha[titulo]</td><td>$linha[dicas]</td><td><a href='like.php?id=$linha[id]'><img src=\"img\like.png\" alt=\"\" width=\"30px\" /></a> $linha[contador] <a href='dislike.php?id=$linha[id]'><img src=\"img\dislike.png\" alt=\"\" width=\"30px\" /></a></td></tr>";
                    }	
                    echo "</table>";
                    echo $consulta->rowCount() . " Registros Exibidos ";
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            ?>
        </div>
    </div>
    <div class="container">
        <br>
        <a href="index.php" id="topo">Voltar ao topo</a>
    </div>
</body>
</html>