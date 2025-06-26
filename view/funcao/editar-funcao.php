<?php
include '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM funcoes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo "Função não encontrada.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_funcao = $_POST['funcao'];
        $salario = $_POST['salario'];

        $sql = 'UPDATE funcoes SET nome_funcao = :nome_funcao, salario = :salario WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_funcao', $nome_funcao);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header('Location: listar-funcoes.php');
            exit;
        } else {
            echo 'Algo deu errado';
        }
    }
} else {
    echo "ID da função não informado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Função</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Estilo customizado -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php include '../../templates/navbar.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4"><i class="fas fa-pen-to-square me-2 text-info"></i>Editar Função</h2>
            <form id="formCadastro" method="POST">
                <div class="mb-3">
                    <label class="form-label">Função:</label>
                    <select name="funcao" class="form-select" id="funcao" required>
                        <option value="">Selecione...</option>
                        <?php
                        $funcoes = ['Auxiliar Administrativo', 'Assistente de Logistica', 'Supervisor', 'Coordenador'];
                        foreach ($funcoes as $funcao) {
                            $selected = ($result['nome_funcao'] === $funcao) ? 'selected' : '';
                            echo "<option value=\"$funcao\" $selected>$funcao</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Salário:</label>
                    <select name="salario" class="form-select" id="salario" required>
                        <?php
                        $salarios = [1500, 2500, 3500, 5000];
                        foreach ($salarios as $valor) {
                            $selected = ($result['salario'] == $valor) ? 'selected' : '';
                            $valor_formatado = "R$ " . number_format($valor, 0, '', '.');
                            echo "<option value=\"$valor\" $selected>$valor_formatado</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Salvar Alterações</button>
                    <button type="button" onclick="window.location.href='listar-funcoes.php';" class="btn btn-primary w-100 mt-2">Voltar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</body>

</html>
