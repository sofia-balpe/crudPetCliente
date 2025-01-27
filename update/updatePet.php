<?php
session_start();
require "../conexaoBanco.php";
global $pdo;

$idUpdate = $_GET['editar'];

$petsData = $pdo->query("SELECT nome, cliente_id, raca from pet where id = $idUpdate");
$result = $petsData->fetch();
?>

<form action="validateUpdatePet.php" method="post">
    <input type="hidden" name="hiddenIdPet" value="<?php echo ($idUpdate); ?>">

    <?php
    $clientesData = $pdo->query("SELECT * FROM cliente");
    $resultCliente = $clientesData->fetchAll();?>

    <?php
    echo "<select name='cliente_id'>";

    foreach ($resultCliente as $cliente) {
        if ($result['cliente_id'] == $cliente['id']) {
            echo "<option value='". $cliente['id'] ."' selected>" . $cliente['name'] . "</option>";
        }else{
            echo "<option value='".$cliente['id'] ."'>" . $cliente['name'] . "</option>";
        }
    }
    echo "</select>";
    ?>

    <input type="text" placeholder="Nome de Pet" name="nomePet" value="<?php echo $result["nome"] ?>" required>
    <input type="text" placeholder="Raça de Pet" name="racaPet" value="<?php echo $result["raca"] ?>" required>
    <input type="submit" value="editar">
</form>
<a href="../index.php">
    <button>Voltar</button>
</a>