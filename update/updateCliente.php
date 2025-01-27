<?php 
session_start();
require "../conexaoBanco.php";
global $pdo;

$feedback = $_SESSION['feedback']?? false;
unset($_SESSION['feedback']);

$idUpdate = $_GET['update'];
$clientesData = $pdo->query("SELECT name, cpf from cliente where id = $idUpdate");
$result = $clientesData->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
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
    <form action="validateUpdateCliente.php" method="post">
        <input type="hidden" name="hiddenId" value="<?php echo ($idUpdate)?>">
        <input type="text" name="nomeCliente" placeholder="nome de Cliente" value="<?php echo $result['name']; ?>">
        <input type="text" name="cpfCliente" placeholder="CPF de Cliente" value="<?php echo $result['cpf']; ?>">
        <input type="submit" value="Editar">
    </form>
    <a href="../index.php">
        <button>Voltar</button>
    </a>
</body>
</html>