<?php 

include '../../config/config.php';

if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    print_r($_GET);

    $sql = 'DELETE FROM funcionarios_funcoes WHERE id = :id ';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        header('Location: listar-vinculo.php');
    }else{
        echo 'Error';
    }

}else {
    echo "ID do vínculo não informado.";
    exit;
}



?>