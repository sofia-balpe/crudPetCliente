<?php 
session_start();
require "../conexaoBanco.php";
global $pdo;

$nome = $_POST['nomeCliente'];
$cpf = $_POST['cpfCliente'];
$id = $_POST['hiddenId'];

$erros = [];

if (strlen($nome)<5) {
    $erros[]="Nome deve ter no mínimo 5 caracteres";
}
if (strlen($cpf)<11) {
    $erros[]="CPF inválido";
}

if (!empty($erros)) {
    $_SESSION['feedback'] = $erros;
    header('Location: updateCliente.php?update=' . $id);
    exit();
}
$sql = "UPDATE cliente SET name = :nome, cpf = :cpf WHERE id= :id";

$PDOStatement = $pdo->prepare($sql);
$PDOStatement->bindParam('nome', $nome);
$PDOStatement->bindParam("cpf", $cpf);
$PDOStatement->bindParam("id", $id);
$PDOStatement->execute();

header('Location: ../listar/listarCliente.php');
exit();
?>