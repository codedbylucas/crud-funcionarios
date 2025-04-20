<?php
include '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // print_r($id);

    $sqlVerifica = 'SELECT COUNT(*) FROM funcionarios_funcoes WHERE funcao_id = :id';
    $stmtVerifica = $pdo->prepare($sqlVerifica);
    $stmtVerifica->bindParam(':id', $id);
    $stmtVerifica->execute();
    $vinculos = $stmtVerifica->fetchColumn();

    if ($vinculos > 0) {
        echo "<p>Esta função está vinculada a um ou mais funcionários e não pode ser excluída.</p>";
        echo "<a href='listar-funcoes.php'>Voltar</a>";
        exit;
    }

    $sqlDelete = 'DELETE FROM funcoes WHERE id = :id';
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->bindParam(':id', $id);

    if ($stmtDelete->execute()) {
        header('Location: listar-funcoes.php');
    } else {
        echo 'Erro';
    }
}
