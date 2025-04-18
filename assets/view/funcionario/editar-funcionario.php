<?php
include '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM funcionarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo "Funcionário não encontrado.";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $cpf = $_POST['cpf'];
        $cidade = $_POST['cidade'];
        $estado_civil = $_POST['estado_civil'];

        $sql = 'UPDATE funcionarios SET nome = :nome, idade = :idade, cpf = :cpf, cidade = :cidade, estado_civil = :estado_civil WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado_civil', $estado_civil);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: listar-funcionarios.php");
            exit();
        } else {
            echo 'Erro ao atualizar dados';
        }
    }
} else {
    echo "ID do funcionário não informado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- CSS Customizado -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php include '../../templates/navbar.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4 text-info"><i class="fas fa-user-edit me-2"></i>Editar Funcionário</h2>
            <form id="formCadastro" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?= $result['nome']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Idade:</label>
                    <input type="number" name="idade" id="idade" class="form-control" value="<?= $result['idade']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">CPF:</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Ex: 106.555.678-90" value="<?= $result['cpf']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $result['cidade']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado Civil:</label>
                    <select name="estado_civil" class="form-select" id="estado_civil" required>
                        <option value="">Selecione...</option>
                        <option value="Solteiro" <?= ($result['estado_civil'] == 'Solteiro' ? 'selected' : ''); ?>>Solteiro</option>
                        <option value="Casado" <?= ($result['estado_civil'] == 'Casado' ? 'selected' : ''); ?>>Casado</option>
                        <option value="Divorciado" <?= ($result['estado_civil'] == 'Divorciado' ? 'selected' : ''); ?>>Divorciado</option>
                        <option value="Viúvo" <?= ($result['estado_civil'] == 'Viúvo' ? 'selected' : ''); ?>>Viúvo</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Atualizar</button>
                    <button type="button" onclick="window.location.href='listar-funcionarios.php';" class="btn btn-primary w-100 mt-2">Voltar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../../assets/js/editar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
