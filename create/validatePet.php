<?php 

session_start();
require "../conexaoBanco.php";
global $pdo;

$nome = $_POST['nomePet'];
$raca = $_POST['racaPet'];
$clienteId = $_POST['select'];

$erros=[];


$cadastrar = $pdo->query("INSERT INTO pet (nome, raca, cliente_id, created_at, update_at) 
values ('{$nome}', '{$raca}', '{$clienteId}', UNIX_TIMESTAMP(), UNIX_TIMESTAMP()) ");
$cadastrar->execute();

header('Location: createPet.php');
exit();

?>