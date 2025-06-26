<?php 

include '../../config/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['funcao_id'],  $_POST['funcionario_id'])){

        $funcionario_id = $_POST['funcionario_id'];
        $funcao_id = $_POST['funcao_id'];
        

        $sql = "INSERT INTO funcionarios_funcoes (funcionario_id, funcao_id) 
        VALUE (:funcionario_id, :funcao_id)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':funcionario_id', $funcionario_id);
        $stmt->bindParam(':funcao_id', $funcao_id);

        if($stmt->execute()){
            header('Location: cadastrar-vinculo.php');
        }else{
            echo 'deu erro animal';
        }
    }

}




?>