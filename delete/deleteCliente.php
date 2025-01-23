<?php 
session_start();
require "../conexaoBanco.php";
global $pdo;

$idDeletar = $_GET['delete'];

$PDOStatement = $pdo->query("DELETE FROM cliente where id=$idDeletar");
$PDOStatement->execute();

header('Location:../listar/listarCliente.php');
?>