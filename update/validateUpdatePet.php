<?php 
session_start();
require "../conexaoBanco.php";
global $pdo;

$nome = $_POST['nomePet'];
$raca = $_POST['racaPet'];
$clienteId = $_POST['select'];
$id = $_POST['hiddenIdPet'];


$sql = "UPDATE pet SET nome = :nome, raca = :raca,  cliente_id = :cliente_id WHERE id= :id";

$PDOStatement = $pdo->prepare($sql);
$PDOStatement->bindParam('nome', $nome);
$PDOStatement->bindParam("raca", $raca);
$PDOStatement->bindParam("id", $id);
$PDOStatement->bindParam("cliente_id", $clienteId);
$PDOStatement->execute();

header('Location: ../listar/listarPet.php');
exit();
?>