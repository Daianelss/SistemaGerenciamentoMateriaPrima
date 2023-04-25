<?php
require 'CadastroMovimentoView.php';
$view = new CadastroMovimentoView();
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
    <form method="post" name="formSalvarEditar" action="cadastro-movimento.php">

        <label for="funcionarioMovimento">Funcionario:</label>
        <input type="combobox" id="funcionarioMovimento" name="funcionarioMovimento" required><br>

        <label for="tipoMateriaPrimaMovimento">Matéria Prima:</label>
        <input type="combobox" id="tipoMateriaPrimaMovimento" name="tipoMateriaPrimaMovimento" required><br>

        <label for="entrada">Movimento</label><br>
        <input type="radio" id="entrada" name="tipoMovimento" value="1">
        <label for="entrada">Entrada</label><br>
        <input type="radio" id="saida" name="tipoMovimento" value="0">
        <label for="saida">Saída</label><br>

        <label for="dataMovimento">Data:</label>
        <input type="date" id="dataMovimento" name="dataMovimento" required><br>

        <label for="pesoMovimento">Peso:</label>
        <input type="text" id="pesoMovimento" name="pesoMovimento" required><br>

        <label for="descMovimento">Descrição:</label>
        <input type="text" id="descMovimento" name="descMovimento" required><br>

        <input type="hidden" id="idMovimento" name="idMovimento"><br>
        <input type="submit" value="Salvar" name="salvar">
    </form>
    <a href="../pages/home/index.php">Voltar</a>
    <?= $view->dispararAcao() ?>
    <form method="post" name="formTabela" action="cadastro-movimento.php">

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

            let tdNomeMovimento = document.querySelector(`td[name="tdNomeMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#nomeMovimento').value = tdNomeMovimento.textContent;

            let tdDescMovimento = document.querySelector(`td[name="tdDescMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#descMovimento').value = tdDescMovimento.textContent;

            document.querySelector('#idMovimento').setAttribute('value', botaoEditar.value);


        }
    </script>

    <?php
    include '../view/bootstrap_foot.php';
    ?>
</body>

</html>