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
    <link rel="stylesheet" href="create.css">
</head>

<body id="idBody">

<?php 
if ($feedback != false) {
    foreach ($feedback as $value) {
        echo $value . "<br>";
    }
}
else{
    echo "Cliente cadastrado com sucesso";
}
?>
<div id="divForm">
    
        <form id="form" action="validateCliente.php" method="post">
            <input id="txtNome" type="text" placeholder="nome de Cliente" name="nomeCliente" required> <br>
            <input id="txtCpf" type="text" placeholder="cpf de Cliente" name="cpfCliente" required><br>
            <input id="idSubmit" type="submit" value="Cadastrar">
        </form>
</div>

    <a href="../listar/listarCliente.php">
        <button>Listar Clientes</button>
    </a>
    <a href="../index.php">
        <button>Voltar</button>
    </a>
</body>

</html>