<?php
include '../../config/config.php';

$sql = "SELECT * FROM funcionarios";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Funcionários</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Estilo customizado -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php include '../../templates/navbar.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4 text-primary"><i class="fas fa-users me-2"></i>Funcionários Cadastrados</h2>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>CPF</th>
                            <th>Cidade</th>
                            <th>Estado Civil</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $funcionario): ?>
                            <tr>
                                <td><?= $funcionario['nome']; ?></td>
                                <td><?= $funcionario['idade']; ?></td>
                                <td><?= $funcionario['cpf']; ?></td>
                                <td><?= $funcionario['cidade']; ?></td>
                                <td><?= $funcionario['estado_civil']; ?></td>
                                <td>
                                    <a href="editar-funcionario.php?id=<?= $funcionario['id']; ?>" class="btn btn-warning btn-sm me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="deletar-funcionario.php?id=<?= $funcionario['id']; ?>" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <button type="button" onclick="window.location.href='cadastro-funcionario.php';" class="btn btn-primary w-100 mt-3">
                    Voltar
                </button>
            </div>
        </div>
    </div>

    <script src="../../assets/js/listar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
