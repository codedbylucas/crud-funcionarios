<?php
include '../../config/config.php';

$sql = "SELECT * FROM funcoes";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Funções</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php include '../../templates/navbar.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4 text-info"><i class="fas fa-briefcase me-2"></i>Funções Cadastradas</h2>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Função</th>
                            <th>Salário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $linha): ?>
                            <tr>
                                <td><?= $linha['nome_funcao']; ?></td>
                                <td><?= 'R$ ' . number_format($linha['salario'], 2, ',', '.'); ?></td>
                                <td>
                                    <a href="editar-funcao.php?id=<?= $linha['id']; ?>" class="btn btn-warning btn-sm me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="deletar-funcao.php?id=<?= $linha['id']; ?>" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <button type="button" onclick="window.location.href='cadastro-funcao.php';" class="btn btn-primary w-100 mt-3">
                    Voltar
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../../assets/js/listar-funcoes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
