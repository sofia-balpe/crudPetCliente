<?php
session_start();
require "../conexaoBanco.php";
global $pdo;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pet</title>
</head>

<body>

    <table>
            <thead>
                <th>Nome</th>
                <th>Raça</th>
                <th>Cliente ID</th>
                <th>Cliente NOME</th>
             
            </thead>

            <tbody>
                <?php 
                  $petsData = $pdo->query("SELECT pet.id, pet.nome, pet.raca, pet.cliente_id, c.name from pet INNER JOIN cliente as c on c.id = pet.cliente_id");
                  $result = $petsData->fetchAll();

                  foreach ($result as $pet) {
                        echo "<tr>";
                        echo "<td>". $pet["nome"]. "</td>";
                        echo "<td>". $pet["raca"]. "</td>";
                        echo "<td>". $pet["cliente_id"]. "</td>";
                        echo "<td>" . $pet["name"] . "</td>"; //Não precisa especificar a tabela aqui, não precisa colocar c.name
                        echo "<td> <a href='../delete/deletePet.php?delete={$pet['id']}'> DELETAR </a> </td>";
                        echo "<td> <a href='../update/updatePet.php?editar={$pet['id']}'> EDITAR </a> </td>";
                        echo "</tr>";
                  }
                
                ?>
            </tbody>
    </table>

    <a href="../create/createPet.php">
        <button>Cadastrar Pet</button>
    </a>
    <a href="../index.php">
        <button>Voltar</button>
    </a>
</body>

</html>