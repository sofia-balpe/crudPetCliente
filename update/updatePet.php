<?php
session_start();
require "../conexaoBanco.php";
global $pdo;

$idUpdate = $_GET['editar'];

$petsData = $pdo->query("SELECT nome, raca from pet where id = $idUpdate");
$result = $petsData->fetch();
?>

<form action="validateUpdatePet.php" method="post">
    <input type="hidden" name="hiddenIdPet" value="<?php echo ($idUpdate);?>">
    <input type="text" placeholder="Nome de Pet" name="nomePet" value="<?php echo $result["nome"] ?>" required>
    <input type="text" placeholder="Raça de Pet" name="racaPet" value="<?php echo $result["raca"] ?>" required>
    <input type="submit" value="editar">
</form>