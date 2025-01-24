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
</head>

<body>

    <?php
    if ($erro) {
        echo $erro;
    }

    ?>
    <table>

        <thead>
            <th>Nome</th>
            <th>CPF</th>
            <th>Criado em</th>
            <th>Atualizado em</th>
        </thead>

        <tbody>
            <?php


            $clientesData = $pdo->query("SELECT * from cliente");
            $results = $clientesData->fetchAll();

            foreach ($results as $cliente) {
                echo "<tr>";
                echo "<td>" . $cliente["name"] . "</td>";
                echo "<td>" . $cliente["cpf"] . "</td>";
                echo "<td>" . $cliente["created_at"] . "</td>";
                echo "<td>" . $cliente["update_at"] . "</td>";
                echo "<td> <a href='../delete/deleteCliente.php?delete={$cliente['id']}'> DELETAR </a> </td>";
                echo "<td> <a href='../update/updateCliente.php?update={$cliente['id']}'> EDITAR </a> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="../create/createCliente.php">
        <button>Cadastrar Cliente</button>
    </a>
</body>

</html>