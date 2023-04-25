<?php
require 'CadastroMateriaPrimaView.php';
$view = new CadastroMateriaPrimaView();
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Materia Prima</title>
    <?php include '../view/bootstrap_head.php'; ?>
</head>

<body>

    <h1>Cadastro de tipo de Matéria Prima</h1>
    <form method="post" name="formSalvarEditar" action="cadastro-materia-prima.php">
        <label for="nomeMateriaPrima">Nome:</label>
        <input type="text" id="nomeMateriaPrima" name="nomeMateriaPrima" required><br>
        <label for="descMateriaPrima">Descrição:</label>
        <input type="text" id="descMateriaPrima" name="descMateriaPrima" required><br>
        <input type="hidden" id="idMateriaPrima" name="idMateriaPrima"><br>
        <input type="submit" value="Salvar" name="salvar">
    </form>

    <?= $view->dispararAcao() ?>
    
    <a href="../pages/home/index.php">Voltar</a>

    <form method="post" name="formTabela" action="cadastro-materia-prima.php">

        <table class='table table-striped'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
            <?= $view->renderizarTabela() ?>
        </table>
    </form>

    <script>
        function preencherCampos(evento) {
            let botaoEditar = evento.target;

            let tdNomeMateriaPrima = document.querySelector(`td[name="tdNomeMateriaPrima"][id="${botaoEditar.value}"]`);
            document.querySelector('#nomeMateriaPrima').value = tdNomeMateriaPrima.textContent;

            let tdDescMateriaPrima = document.querySelector(`td[name="tdDescMateriaPrima"][id="${botaoEditar.value}"]`);
            document.querySelector('#descMateriaPrima').value = tdDescMateriaPrima.textContent;

            document.querySelector('#idMateriaPrima').setAttribute('value', botaoEditar.value);


        }
    </script>

    <?php
    include '../view/bootstrap_foot.php';
    ?>
</body>

</html>