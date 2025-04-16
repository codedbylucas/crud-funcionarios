<?php

include 'config.php';

$sql = "SELECT * FROM funcionarios";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result);



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
        <h2 class="text-center mb-4 text-primary"><i class="fas fa-user"></i>Funcionarios Cadastrados</h2>
            <table class="table table-bordered table-hover">

                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>CPF</th>
                        <th>Cidade</th>
                        <th>Estado Civil</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($result as $result): ?>
                        <tr>
                            <td><?php echo $result['nome']; ?></td>
                            <td><?php echo $result['idade']; ?></td>
                            <td><?php echo $result['cpf']; ?></td>
                            <td><?php echo $result['cidade']; ?></td>
                            <td><?php echo $result['estado_civil']; ?></td>
                            <td>
                                <a name="botao" href="deletar.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm">Deletar</a>
                                <a href="editar.php?id=<?php echo $result['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>

            <div class="text-center">
                <button type="buttton" onclick="window.location.href='formulario-cadastro.php';" class="btn btn-primary w-100" style="margin-top: 10px;">Voltar</button>
            </div>
            </form>
        </div>
    </div>

    <script src="../js/listar.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>