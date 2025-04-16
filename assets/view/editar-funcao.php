<?php

include 'config.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM funcoes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_funcao = $_POST['funcao'];
        $salario = $_POST['salario'];

        // print_r($_POST);

        // $sql = 'UPDATE funcoes SET(nome_funcao = :nome_funcao, salario = :salario WHERE id = :id)'; ---- forma errada
        $sql = 'UPDATE funcoes SET nome_funcao = :nome_funcao, salario = :salario WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam('nome_funcao', $nome_funcao);
        $stmt->bindParam('salario', $salario);
        $stmt->bindParam('id', $id);

        if ($stmt->execute()) {
            header('Location: listar-funcoes.php');
            exit;
        } else {
            echo 'Algo deu errado';
        }
    }
}

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

</head>

<body class="bg-light">
    <?php include '../templates/navbar.php'; ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4 text-warning"><i class="fas fa-briefcase"></i>Editar função</h2>
            <form id="formCadastro" method="POST">
                <div class="mb-3">
                    <label class="form-label">Função:</label>
                    <select name="funcao" class="form-select" id="funcao">
                        <option value="">Selecione...</option>
                        <option value="Auxiliar Administrativo" <?php echo ($result['nome_funcao'] == 'Auxiliar Administrativo' ? 'selected' : ''); ?>>Auxiliar Administrativo</option>
                        <option value="Assistente de Logistica" <?php echo ($result['nome_funcao'] == 'Assistente de Logistica' ? 'selected' : ''); ?>>Assistente de Logistica</option>
                        <option value="Supervisor" <?php echo ($result['nome_funcao'] == 'Supervisor' ? 'selected' : ''); ?>>Supervisor</option>
                        <option value="Condenador" <?php echo ($result['nome_funcao'] == 'Condenador' ? 'selected' : ''); ?>>Condenador</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Salario:</label>
                    <select name="salario" class="form-select" id="salario">
                        <option value="">Selecione...</option>
                        <option value="1500" <?php echo ($result['salario'] == '1500' ? 'selected' : ''); ?>>1.500</option>
                        <option value="2500" <?php echo ($result['salario'] == '2500' ? 'selected' : ''); ?>>2.500</option>
                        <option value="3500" <?php echo ($result['salario'] == '3500' ? 'selected' : ''); ?>>3.500</option>
                        <option value="5000" <?php echo ($result['salario'] == '5000' ? 'selected' : ''); ?>>5.000</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Editar</button>
                    <button type="button" onclick="window.location.href='listar-funcoes.php';" class="btn btn-primary w-100" style="margin-top: 10px;">Listar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</body>

</html>