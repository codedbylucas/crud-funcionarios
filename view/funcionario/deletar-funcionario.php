<?php
include '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sqlVerifica = 'SELECT COUNT(*) FROM funcionarios_funcoes WHERE funcionario_id = :id';
    $stmtVerifica = $pdo->prepare($sqlVerifica);
    $stmtVerifica->bindParam(':id', $id);
    $stmtVerifica->execute();
    $vinculos = $stmtVerifica->fetchColumn();

    if ($vinculos > 0) {
        echo "<p>Este funcionário está vinculado a uma ou mais funções e não pode ser excluído.</p>";
        echo "<a href='listar-funcionarios.php'>Voltar</a>";
        exit;
    }

    // Se não houver vínculos, prossegue com a exclusão
    $sqlDelete = 'DELETE FROM funcionarios WHERE id = :id';
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->bindParam(':id', $id);
    $stmtDelete->execute();

    echo "<p>Funcionário excluído com sucesso.</p>";
    echo "<a href='listar-funcionario.php'>Voltar para a lista</a>";
}
?>
