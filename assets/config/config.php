<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'enmpresa';

try {
    // Criando a conexão com PDO
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    
    // Definindo o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Caso ocorra um erro, exibe a mensagem
    die("Falha na conexão: " . $e->getMessage());
}

?>