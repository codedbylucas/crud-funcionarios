<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Função</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php include '../../templates/navbar.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4 text-info"><i class="fas fa-briefcase me-2"></i>Cadastro de Função</h2>
            <form id="formCadastro" action="inserir-funcao.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Função:</label>
                    <select name="funcao" class="form-select" id="funcao" required>
                        <option value="">Selecione...</option>
                        <option value="Auxiliar Administrativo">Auxiliar Administrativo</option>
                        <option value="Assistente de Logistica">Assistente de Logistica</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Coordenador">Coordenador</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Salário:</label>
                    <select name="salario" class="form-select" id="salario" required>
                        <option value="">Selecione...</option>
                        <option value="1500">R$ 1.500</option>
                        <option value="2500">R$ 2.500</option>
                        <option value="3500">R$ 3.500</option>
                        <option value="5000">R$ 5.000</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                    <button type="button" onclick="window.location.href='listar-funcoes.php';" class="btn btn-primary w-100 mt-2">Listar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</body>

</html>
