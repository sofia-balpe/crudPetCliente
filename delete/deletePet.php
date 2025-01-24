<?php 
session_start();
require "../conexaoBanco.php";
global $pdo;

$idDeletePet = $_GET['delete'];

$deletar = $pdo->query("DELETE FROM pet where id=$idDeletePet");
$deletar->execute();

header('Location: ../listar/listarPet.php');
?>