<?php
session_start();
$erro = $_SESSION['erro'] ?? false;
unset($_SESSION['erro']);
require "../conexaoBanco.php";
global $pdo;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
    <link rel="stylesheet" href="listar.css">
</head>

<body id="body">

    <?php
    if ($erro) {
        echo $erro;
    }

    ?>
    <table id="table">

        <thead id="thead">
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Criado em</th>
            <th>Atualizado em</th>
        </thead>

        <tbody id="tbody">
            <?php


            $clientesData = $pdo->query("SELECT * from cliente");
            $results = $clientesData->fetchAll();

            foreach ($results as $cliente) {
                echo "<tr>";
                echo "<td>" . $cliente["id"] . "</td>";
                echo "<td>" . $cliente["name"] . "</td>";
                echo "<td>" . $cliente["cpf"] . "</td>";
                echo "<td>" . date('m/d/Y H:i:s', $cliente['created_at']) . "</td>";
                echo "<td>" . date('m/d/Y H:i:s', $cliente['update_at']) . "</td>";
                echo "<td> <a href='../delete/deleteCliente.php?delete={$cliente['id']}'> DELETAR </a> </td>";
                echo "<td> <a href='../update/updateCliente.php?update={$cliente['id']}'> EDITAR </a> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="../create/createCliente.php">
        <button id="btnCad"><img id="iconCad" src="../imagens/iconPessoaMais.png" alt=""></button>
    </a>
    <a href="../index.php">
        <button>Voltar</button>
    </a>
</body>

</html>