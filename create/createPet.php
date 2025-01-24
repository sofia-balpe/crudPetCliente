<?php
session_start();
require "../conexaoBanco.php";
global $pdo;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pet</title>
</head>

<body>


    <form action="validatePet.php" method="post">
        <?php
        $clientesData = $pdo->query("SELECT * from cliente");
        $result = $clientesData->fetchAll();

        echo "<select name='select' id=''>";
        foreach ($result as $cliente) {
            echo "<option name='option' value='$cliente[id]'> $cliente[name] </option>";
        }
        echo "</select>";
        ?>

        <input type="text" placeholder="Nome de Pet" name="nomePet" required>
        <input type="text" placeholder="Raça de Pet" name="racaPet" required>
        <input type="submit" value="cadastrar">
    </form>
<a href="../listar/listarPet.php">listar Pet</a>
</body>

</html>