<?php

include '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = 'SELECT funcionario_id, funcao_id FROM funcionarios_funcoes WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $vinculo = $stmt->fetch(PDO::FETCH_ASSOC);

    $sqlFuncionarios = 'SELECT * FROM funcionarios';
    $stmtFuncionarios = $pdo->prepare($sqlFuncionarios);
    $stmtFuncionarios->execute();
    $resultFuncionarios = $stmtFuncionarios->fetchAll(PDO::FETCH_ASSOC);

    // print_r($resultFuncionarios);

    $sqlFuncao = 'SELECT * FROM funcoes';
    $stmtFuncoes = $pdo->prepare($sqlFuncao);
    $stmtFuncoes->execute();
    $resultFuncoes = $stmtFuncoes->fetchAll(PDO::FETCH_ASSOC);

    // print_r($resultFuncoes);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['funcionario_id'], $_POST['funcao_id'])) {
            $funcionario_id = $_POST['funcionario_id'];
            $funcao_id = $_POST['funcao_id'];

            $sql = 'UPDATE funcionarios_funcoes SET funcionario_id = :funcionario_id, funcao_id = :funcao_id WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':funcionario_id', $funcionario_id);
            $stmt->bindParam(':funcao_id', $funcao_id);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                header('Location: listar-vinculo.php');
            } else {
                echo 'Não deu para editar';
            }
        }
    } 
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vincular Funcionário à Função</title>

    <!-- Bootstrap + FontAwesome + Estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php include '../../templates/navbar.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4 text-primary"><i class="fas fa-link me-2"></i>Editar Vinculo</h2>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Funcionário:</label>
                    <select name="funcionario_id" class="form-select" required>
                        <option value="">Selecione...</option>
                        <?php foreach ($resultFuncionarios as $funcionario): ?>
                            <option value="<?= $funcionario['id']; ?>"
                                <?= ($funcionario['id'] == $vinculo['funcionario_id']) ? 'selected' : ''; ?>>
                                <?= $funcionario['nome']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Função:</label>
                    <select name="funcao_id" class="form-select" required>
                        <option value="">Selecione...</option>
                        <?php foreach ($resultFuncoes as $funcao): ?>
                            <option value="<?= $funcao['id']; ?>"
                                <?= ($funcao['id'] == $vinculo['funcao_id']) ? 'selected' : ''; ?>>
                                <?= $funcao['nome_funcao']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Atualizar vinculo</button>
                    <button type="button" class="btn btn-primary w-100 mt-2" onclick="window.location.href='listar-vinculo.php';">Listar Vínculos</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>