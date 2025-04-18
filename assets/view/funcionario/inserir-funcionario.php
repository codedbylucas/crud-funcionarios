<?php

include '../../config/config.php';

// Serve para verificar se o método que está vindo é o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['nome'], $_POST['idade'], $_POST['cpf'], $_POST['cidade'], $_POST['estado_civil'])) {
        // Pega os dados do formulário
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $cpf = $_POST['cpf'];
        $cidade = $_POST['cidade'];
        $estado_civil = $_POST['estado_civil'];

        // Exibe os dados para depuração
        // var_dump($_POST);

        // Consulta SQL para inserir os dados na tabela
        $sql = "INSERT INTO funcionarios (nome, idade, cpf, cidade, estado_civil) 
                VALUES (:nome, :idade, :cpf, :cidade, :estado_civil)";

        // Prepara a consulta
        $stmt = $pdo->prepare($sql);

        // Vincula os parâmetros com as variáveis
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado_civil', $estado_civil);

        // Executa a consulta
        $stmt->execute();


        header('Location: cadastro-funcionario.php');

    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
