<?php 
session_start();
require "../conexaoBanco.php";
global $pdo;

$nome = $_POST['nomePet'];
$raca = $_POST['racaPet'];
$id = $_POST['hiddenIdPet'];


$sql = "UPDATE pet SET nome = :nome, raca = :raca WHERE id= :id";

$PDOStatement = $pdo->prepare($sql);
$PDOStatement->bindParam('nome', $nome);
$PDOStatement->bindParam("raca", $raca);
$PDOStatement->bindParam("id", $id);
$PDOStatement->execute();

header('Location: ../listar/listarPet.php');
exit();
?>