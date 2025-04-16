<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $funcionario_id = $_POST['funcionario_id'];
    $funcao_id = $_POST['funcao_id'];


    $sql = 'UPDATE funcionarios SET id_funcao = :funcao_id WHERE id = :funcionario_id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':funcao_id', $funcao_id);
    $stmt->bindParam(':funcionario_id', $funcionario_id);


    if ($stmt->execute()) {
        echo 'SHOW DE BOLA, VINCULADO';
    };
}
