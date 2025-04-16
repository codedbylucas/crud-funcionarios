<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['funcao'], $_POST['salario'])) {
        $nome_funcao = $_POST['funcao'];
        $salario = $_POST['salario'];

        echo 'CHegou aqui';

        $sql = "INSERT INTO funcoes (nome_funcao, salario) VALUES (:nome_funcao, :salario)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_funcao', $nome_funcao);
        $stmt->bindParam(':salario', $salario);

        if ($stmt->execute()) {
            header('Location: cadastro-funcao.php');
            exit;
        } else {
            echo 'Erro ao executar a query.';
        }
    } else {
        echo 'Erro: nome_funcao ou salario não enviados.';
    }
}