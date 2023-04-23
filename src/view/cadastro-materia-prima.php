<?php
require 'CadastroMateriaPrimaView.php'; // Inclui o arquivo da classe bancaview

// Instancia a classe bancaview
$view = new CadastroMateriaPrimaView();

// Chama o método para renderizar o formulário de cadastro
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Funcionário</title>
    <?php include '../view/bootstrap_head.php'; ?>
</head>

<body>

    <h1>Cadastro de tipo de Matéria Prima</h1>
    <form method="post" name="editarSalvar">
        <label for="materiaPrima">Nome:</label>
        <input type="text" id="materiaPrima" name="materiaPrima" required><br>
        <label for="descricaoMateriaPrima">Descrição:</label>
        <input type="text" id="descricaoMateriaPrima" name="descricaoMateriaPrima" required><br>
        <input type="submit" value="Salvar">
    </form>

    <?php
    $view->dispararAcao();
    $view->renderizarTabela();
    ?>

    <script>
        const botoesEditar = document.querySelectorAll('.btn-editar');
        botoesEditar.forEach(botao => {
            botao.addEventListener('click', () => {
                const id = botao.dataset.id;
                const linha = botao.parentNode.parentNode;
                const nome = linha.querySelector('td:nth-child(2)').textContent;
                const form = document.querySelector('form[name="editarSalvar"]');
                form.materiaPrima.value = nome;

                //Verifica se o campo hidden já existe
                const campoIdhidden = form.querySelector('input[name="id"]');
                const campoIdtext = form.querySelector('input[name="idtext"]');

                if (campoIdhidden) {
                    campoIdhidden.value = id;
                    campoIdtext.value = id;
                } else {
                    form.insertAdjacentHTML('beforeend', '<input type="hidden" name="id" value="' + id + '">');
                    form.insertAdjacentHTML('beforeend', '<input type="text" name="idtext" value="' + id + '">');
                }
            });
        });
    </script>

    <?php
    include '../view/bootstrap_foot.php';
    ?>
</body>

</html>