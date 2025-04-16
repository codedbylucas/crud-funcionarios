<?php

include 'config.php';

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
    <title>Listar funcionario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include '../templates/navbar.php'; ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4 text-warning"><i class="fas fa-briefcase"></i>Funções cadastradas</h2>
            <table class="table table-bordered table-hover">

                <thead class="thead-dark">
                    <tr>
                        <th>Função</th>
                        <th>Salario</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($result as $linha): ?>
                        <tr>
                            <td><?=  $linha['nome_funcao']; ?></td>
                            <td><?= "R$ " . number_format($linha['salario'], 2, ',', '.') ?></td>
                            <td>
                                <a href="editar-funcao.php?id=<?= $linha['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="deletar-funcao.php?id=<?= $linha['id']; ?>" class="btn btn-danger btn-sm">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
            <div class="text-center">
                <button type="buttton" onclick="window.location.href='cadastro-funcao.php';" class="btn btn-primary w-100" style="margin-top: 10px;">Voltar</button>
            </div>
            </form>
        </div>
    </div>

    <script src="../js/listar.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>