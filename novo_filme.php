<?php

try 
{
    if ($_POST) 
    {
        // Data Source Name
        $dsn = "mysql:host=localhost;dbname=web3";

        //Opções de Configuração do PDO
        $cfg = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        // PHP Data Object
        $conexao = new PDO($dsn, "root", "@MySQL_dev_2020", $cfg);

        $stmt = $conexao->prepare("INSERT INTO filmes (titulo, ano_lancamento) VALUES (?, ?) ");
        $stmt->bindValue(1, $_POST['titulo']);
        $stmt->bindValue(2, $_POST['ano_lancamento']);
        $stmt->execute();

        echo "Filme inserido com sucesso!";
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
<a href="/">Lista de Filmes</a>

    <fieldset>
        <legend>Novo Filme</legend>

        

        <form method="post" action="novo_filme.php">
            <label>
                Título: <input name="titulo" type="text" />
            </label>

            <label>
                Ano de Lançamento: <input name="ano_lancamento" type="number" />
            </label>

            <button type="submit">Enviar</button>

        </form>

    </fieldset>
</body>