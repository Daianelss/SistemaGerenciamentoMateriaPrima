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
<header class="bg-secondary p-3">
    <h1 class="text-center mb-5 text-white">Cadastro de tipo de Matéria Prima</h1>
</header>

<body>

    <div class="container border border-dark mt-5">
        <form method="post" name="formSalvarEditar" action="cadastro-movimento.php">
            <div class="d-flex flex-row mb-3 mt-5">
                <label for="funcionarioMovimento">Funcionário:</label>
                <input class="ms-2 me-3" type="combobox" id="funcionarioMovimento" name="funcionarioMovimento" required><br>
                <label for="tipoMateriaPrimaMovimento">Matéria Prima:</label>
                <input class="ms-2 me-3" type="combobox" id="tipoMateriaPrimaMovimento" name="tipoMateriaPrimaMovimento" required><br>
            </div>
            <div class="d-flex flex-row mb-3">
                <label for="entrada">Movimento:</label><br>
                <input class="ms-3" type="radio" id="entrada" name="tipoMovimento" value="1">
                <label class="ms-3" for="entrada">Entrada</label><br>
                <input class="ms-3" type="radio" id="saida" name="tipoMovimento" value="0">
                <label class="ms-3" for="saida">Saída</label><br>
            </div>
            <div class="d-flex flex-row">
                <div>
                    <label for="dataMovimento">Data:</label>
                    <input class="ms-2 me-3" type="date" id="dataMovimento" name="dataMovimento" required><br>
                </div>
                <div>
                    <label for="pesoMovimento">Peso:</label>
                    <input class="ms-2 me-3 " type="text" id="pesoMovimento" name="pesoMovimento" required><br>
                </div>
                <div>
                    <label for="descMovimento">Descrição:</label>
                    <input class="ms-2" type="text" id="descMovimento" name="descMovimento" required><br>
                    <input type="hidden" id="idMovimento" name="idMovimento"><br>
                </div>

            </div>
            <div class="mb-4">

                <input class="btn btn-secondary ms-3 mt-2" type="submit" value="Salvar" name="salvar">
                <button class="btn btn-secondary ms-3 mt-2" onclick="window.location.href='http://localhost/src/pages/home/index.php'">Voltar</button>

            </div>
        </form>
    </div>

    <?= $view->dispararAcao() ?>
    <form method="post" name="formTabela" action="cadastro-movimento.php">

        <table class='table table-secondary table-bordered container table-striped table-hover mt-5'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Edição</th>
                <th>Status</th>
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