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
            <h2 class="text-center mb-4 text-warning"><i class="fas fa-briefcase"></i>Cadastro de Função</h2>
            <form id="formCadastro" action="inserir-funcao.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Função:</label>
                    <select name="funcao" class="form-select" id="funcao">
                        <option value="">Selecione...</option>
                        <option value="Auxiliar Administrativo">Auxiliar Administrativo</option>
                        <option value="Assistente de Logistica">Assistente de Logistica</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Condenador">Condenador</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Salario:</label>
                    <select name="salario" class="form-select" id="salario">
                        <option value="">Selecione...</option>
                        <option value="1500">1.500</option>
                        <option value="2500">2.500</option>
                        <option value="3500">3.500</option>
                        <option value="5000">5.000</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                    <button type="button" onclick="window.location.href='listar-funcoes.php';" class="btn btn-primary w-100" style="margin-top: 10px;">Listar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</body>

</html>