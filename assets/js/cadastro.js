$(document).ready(function () {
    $('#formCadastro').submit(function (event) {

        // Coleta os valores dos campos
        let nome = $('#nome').val().trim();
        let idade = $('#idade').val();
        let cpf = $('#cpf').val().trim();
        let cidade = $('#cidade').val().trim();
        let estado_civil = $('#estado_civil').val();

        // Validação dos campos
        if (nome === '') {
            mostrarModal('Preencha o campo nome');
            return false;
        }

        if (idade <= 0) {
            mostrarModal('Preencha o campo idade');
            return false;
        }

        if (cpf <= 0) {
            mostrarModal('CPF inválido. O CPF deve ter 11 números.');
            return false;
        }

        if (cidade === '') {
            mostrarModal('A cidade é obrigatória.');
            return false;
        }

        if (estado_civil === '') {
            mostrarModal('O estado civil é obrigatório.');
            return false;
        }

        mostrarSucesso();
        return false;  // Evita o envio do formulário
    });
});

// Função para mostrar o modal de erro
function mostrarModal(mensagem) {
    Swal.fire({
        icon: 'error',
        title: 'Erro',
        text: mensagem,
        confirmButtonColor: '#d33'
    });
}

function limparForms() {
    document.getElementById('formCadastro').reset();
    // console.log("Limpando formulário...");
}
// Função para mostrar o modal de sucesso
function mostrarSucesso() {
    Swal.fire({
        icon: 'success',
        title: 'Cadastro Realizado com Sucesso!',
        text: 'O funcionário foi cadastrado corretamente.',
        confirmButtonColor: '#28a745'
    }).then(() => {
        $('#formCadastro')[0].submit(); // Envia o formulário de verdade
    })
}