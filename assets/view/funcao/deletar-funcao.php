<?php 
include '../../config/config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    print_r($id);

    $sql = 'DELETE FROM funcoes WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    

    if($stmt->execute()){
        header('Location: listar-funcoes.php');
    }else{
        echo 'Erro'; 
    }


}

?>