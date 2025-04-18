<?php

include '../../config/config.php';


$funcionario = $pdo->query('SELECT id, nome FROM funcionarios')->fetchAll(PDO::FETCH_ASSOC);
$funcoes = $pdo->query("SELECT id, nome_funcao FROM funcoes")->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar funcionario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include '../../templates/navbar.php'; ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4 text-danger">Vincular Funcionarios</h2>
            <form id="formCadastro" action="vincular-funcao.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Funcionario:</label>
                    <select name="funcionario_id" class="form-select" id="funcionario_id">
                        <?php foreach ($funcionario as $funcionario): ?>
                            <option value="<?= $funcionario['id'] ?>"><?php echo $funcionario['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Função:</label>
                    <select name="funcao_id" class="form-select" id="funcao_id">
                        <?php foreach ($funcoes as $funcoes): ?>
                            <option value="<?= $funcoes['id'] ?>"><?php echo $funcoes['nome_funcao'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Vincular Funcionario</button>
                    <button type="buttton" onclick="window.location.href='';" class="btn btn-primary w-100" style="margin-top: 10px;">Listar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/listar.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>