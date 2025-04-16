<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    var_dump($_GET);   

    
    $sql = "DELETE FROM funcionarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: listar.php");  
    } else {
        echo "Erro ao excluir funcionário.";
    }
}else{

    echo 'ID nao encontrado';
}

?>