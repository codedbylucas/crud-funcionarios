<?php
ob_start();
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM funcionarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            header("Location: listar.php");
            exit();
        } else {
            echo 'Erro ao atualizar dados';
        }
    };
};
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Funcionário</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-light">
    <?php include '../templates/navbar.php'; ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4 text-primary"><i class="fas fa-user"></i>Editar Funcionario</h2>
            <form id="formCadastro" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $result['nome']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Idade:</label>
                    <input type="number" name="idade" id="idade" class="form-control" value="<?php echo $result['idade']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">CPF:</label>
                    <input type="number" name="cpf" id="cpf" class="form-control" placeholder="Ex: 106.555.678-90" value="<?php echo $result['cpf']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo $result['cidade']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado Civil:</label>
                    <select name="estado_civil" class="form-select" id="estado_civil">
                        <option value="">Selecione...</option>
                        <option value="Solteiro" <?php echo ($result['estado_civil'] == 'Solteiro' ? 'selected' : ''); ?>>Solteiro</option>
                        <option value="Casado" <?php echo ($result['estado_civil'] == 'Casado' ? 'selected' : ''); ?>>Casado</option>
                        <option value="Divorciado" <?php echo ($result['estado_civil'] == 'Divorciado' ? 'selected' : ''); ?>>Divorciado</option>
                        <option value="Viúvo" <?php echo ($result['estado_civil'] == 'Viúvo' ? 'selected' : ''); ?>>Viúvo</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Atualizar</button>
                    <button type="buttton" onclick="window.location.href='listar.php';" class="btn btn-primary w-100" style="margin-top: 10px;">Voltar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/editar.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>