<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'empresa';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}

?>