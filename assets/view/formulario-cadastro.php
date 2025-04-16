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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-light">
    <?php include '../templates/navbar.php'; ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4 text-primary"><i class="fas fa-user"></i>Cadastro de Funcionário</h2>
            <form id="formCadastro" action="cadastro.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Idade:</label>
                    <input type="number" name="idade" id="idade" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">CPF:</label>
                    <input type="number" name="cpf" id="cpf" class="form-control" placeholder="Ex: 106.555.678-90">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado Civil:</label>
                    <select name="estado_civil" class="form-select" id="estado_civil">
                        <option value="">Selecione...</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viúvo">Viúvo</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                    <button type="button" onclick="window.location.href='listar.php';" class="btn btn-primary w-100" style="margin-top: 10px;">Listar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script src="../js/cadastro.js"></script>

</body>

</html>