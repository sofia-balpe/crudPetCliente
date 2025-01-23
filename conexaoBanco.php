<?php
$host = "localhost";
$port = 3306;
$user = "root";
$password = "";
$dbname = "estagio";

try {
    $pdo = new PDO(
        "mysql:host={$host}; dbname={$dbname}; charset=utf8", 
        $user, $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
}
catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>