<?php 
session_start();
require "../conexaoBanco.php";
global $pdo;

$idDeletar = $_GET['delete'];


$sql = "SELECT pet.id FROM pet WHERE cliente_id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(["id"=>$idDeletar]);
$result = $stmt->fetch();



if ($result != false) {
    $_SESSION['erro'] = "Não é possivel deletar, o cliente tem um pet cadastrado";
    header('Location: ../listar/listarCliente.php');
    exit();
}
$PDOStatement = $pdo->query("DELETE FROM cliente where id=$idDeletar");
$PDOStatement->execute();

header('Location:../listar/listarCliente.php');

?>