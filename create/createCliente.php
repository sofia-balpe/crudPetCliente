<?php
session_start();
require "../conexaoBanco.php";
global $pdo;

$feedback = $_SESSION['feedback']?? false;
unset($_SESSION['feedback']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>

<body>

<?php 
if ($feedback != false) {
    foreach ($feedback as $value) {
        echo $value;
    }
}
else{
    echo "Cliente cadastrado com sucesso";
}
?>

    <form action="validateCliente.php" method="post">
        <input type="text" placeholder="nome de Cliente" name="nomeCliente" required>
        <input type="text" placeholder="cpf de Cliente" name="cpfCliente" required>
        <input type="submit" value="Cadastrar">
    </form>

    <a href="../listar/listarCliente.php">
        <button>Listar Clientes</button>
    </a>
</body>

</html>