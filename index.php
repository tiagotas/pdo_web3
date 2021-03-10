<?php

try {    
    // Data Source Name
    $dsn = "mysql:host=localhost;dbname=web3";

    // PHP Data Object
    $conexao = new PDO($dsn, "root", "@MySQL_dev_2020");

    // Preparated Statements
    $stmt = $conexao->prepare("SELECT id, titulo, ano_lancamento FROM filmes");
    $stmt->execute();

    $arr_filmes = $stmt->fetchAll(PDO::FETCH_CLASS);
    $total_filmes = sizeof($arr_filmes); // count

} catch (Exception $e) {
    echo "Deu erro: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <a href="novo_filme.php">Novo Filme</a>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Ano de Lançamento</th>
            </tr>
        </thead>
        <tbody>

            <?php for($i=0;$i<$total_filmes; $i++): ?>
            <tr>
                <td> <?= $arr_filmes[$i]->id ?>      </td>
                <td> <?= $arr_filmes[$i]->titulo ?>        </td>
                <td> <?= $arr_filmes[$i]->ano_lancamento ?> </td>
            </tr>
            <?php endfor ?>

        </tbody>
    </table>
</body>

</html>