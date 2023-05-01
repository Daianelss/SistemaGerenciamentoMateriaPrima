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
        <input type="text" id="funcionarioMovimento" name="funcionarioMovimento" required><br>

        <label for="tipoMovimento">Movimento:</label>
        <input type="text" id="tipoMovimento" name="tipoMovimento" required><br>

        <label for="entrada">Operacao</label><br>
        
        <label for="entrada">Entrada</label><br>
        <input type="radio" id="entrada" name="tipoOperacao" value="1">
        <label for="saida">Saída</label><br>
        <input type="radio" id="saida" name="tipoOperacao" value="0">


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


            let tdTipoMovimento = document.querySelector(`td[name="tdTipoMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#TipoMovimento').value = tdTipoMovimento.textContent;

            let tdMovimento = document.querySelector(`td[name="tdMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#Movimento').value = tdMovimento.textContent;

            let tdDataMovimento = document.querySelector(`td[name="tdDataMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#DataMovimento').value = tdDataMovimento.textContent;

            let tdPesoMovimento = document.querySelector(`td[name="tdPesoMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#PesoMovimento').value = tdPesoMovimento.textContent;

            let tdDescMovimento = document.querySelector(`td[name="tdDescMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#DescMovimento').value = tdDescMovimento.textContent;

            document.querySelector('#idMovimento').setAttribute('value', botaoEditar.value);


        }
    </script>

    <?php
    include '../view/bootstrap_foot.php';
    ?>
</body>

</html>