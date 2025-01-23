<?php
session_start();
require "../conexaoBanco.php";
global $pdo;

$nome = $_POST['nomeCliente'];
$cpf = $_POST['cpfCliente'];

$erros = [];

if (strlen($nome)<5) {
    $erros[]="Nome deve ter no mínimo 5 caracteres";
}
if (strlen($cpf)<11) {
    $erros[]="CPF inválido";
}

if (!empty($erros)) {
    $_SESSION['feedback'] = $erros;
    header('Location: createCliente.php');
    exit();
}

$cadastrar = $pdo->query("INSERT INTO cliente (name, cpf, created_at, update_at) 
values ('{$nome}', '{$cpf}', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()) ");

$cadastrar->execute();
header('Location: createCliente.php');
exit();
?>