<?php
include '../../config/config.php';

$sql = 'SELECT
           ff.id,
           f.nome AS funcionario,
           fc.nome_funcao AS funcao,
           ff.data_vinculo
        FROM funcionarios_funcoes ff
        JOIN funcionarios f ON f.id = ff.funcionario_id
        JOIN funcoes fc on fc.id = ff.funcao_id';
        
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Vinculos</title>

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
            <h2 class="text-center mb-4 text-primary"><i class="fas fa-users me-2"></i>Vinculos Cadastrados</h2>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Funcionario</th>
                            <th>Funcao</th>
                            <th>Data do vinculo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $result): ?>
                            <tr>
                                <td><?= $result['funcionario']; ?></td>
                                <td><?= $result['funcao']; ?></td>
                                <td><?= date('d/m/Y', strtotime($result['data_vinculo'])); ?></td>
                                <td>
                                    <a href="editar-vinculo.php?id=<?= $result['id']; ?>" class="btn btn-warning btn-sm me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="deletar-vinculo.php?id=<?= $result['id']; ?>" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <button type="button" onclick="window.location.href='cadastrar-vinculo.php';" class="btn btn-primary w-100 mt-3">
                    Voltar
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
