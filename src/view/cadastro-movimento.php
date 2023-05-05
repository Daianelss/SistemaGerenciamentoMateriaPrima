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
    <style>
        .bg-secondary {
            background-color: rgb(118, 30, 72, 0.57) !important;
        }

        body {
            background-color: rgb(217, 217, 217, 0.4) !important;
        }

        .btn {
            color: black !important;
            background-color: #EDD8FD !important;
            border: 1px solid #000000 !important;
            border-radius: 10px !important;
            box-sizing: border-box !important;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25) !important;
        }

        input {
            border-radius: 8px !important;
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);
        }

        #rolagem {
            overflow: auto !important;
            width: 1320px !important;
            height: 350px !important;
            margin:auto !important;
        }
    </style>
</head>
<header class="bg-secondary p-3">
    <h1 class="text-center mb-5 text-black">Cadastro de tipo de Matéria Prima</h1>
</header>

<body>

    <div class="container border border-dark mt-5 mb-5">
        <form method="post" name="formSalvarEditar" action="cadastro-movimento.php">
            <div class="d-flex flex-row mb-3 mt-5">

                <label for="funcionarioMovimento">Funcionario:</label>
                <input class="ms-2 me-3" type="text" id="funcionarioMovimento" name="funcionarioMovimento" required><br>

                <label for="processoMovimento">Processo:</label>
                <input class="ms-2 me-3" type="text" id="processoMovimento" name="processoMovimento" required><br>
            </div>
            <div class="d-flex flex-row mb-3">
                <label>Operação</label><br>
                <input class="ms-2 me-3" type="radio" id="entrada" name="tipoOperacaoMovimento" value="1">
                <label for="entrada">Entrada</label><br>

                <input class="ms-2 me-3" type="radio" id="saida" name="tipoOperacaoMovimento" value="0">
                <label for="saida">Saída</label><br>
            </div>
            <div class="d-flex flex-row mb-3">
                <div>
                    <label for="dataMovimento">Data:</label>
                    <input class="ms-2 me-3" type="date" id="dataMovimento" name="dataMovimento" required><br>
                </div>
                <div>
                    <label for="pesoMovimento">Peso:</label>
                    <input class="ms-2 me-3" type="number" id="pesoMovimento" name="pesoMovimento" required><br>
                </div>
                <div>
                    <label for="descMovimento">Descrição:</label>
                    <input type="text" id="descMovimento" name="descMovimento" required><br>
                </div>
                <input type="hidden" id="idMovimento" name="idMovimento"><br>
            </div>
            <div class="mb-4">

                <input class="btn btn-secondary ms-3 mt-2" type="submit" value="Salvar" name="salvar">
                <button class="btn btn-secondary ms-3 mt-2" onclick="window.location.href='http://localhost/src/pages/home/index.php'">Voltar</button>

            </div>
        </form>
    </div>

    <?= $view->dispararAcao() ?>
    <form method="post" name="formTabela" action="cadastro-movimento.php">
        <div id="rolagem">
            <table class='table table-secondary table-bordered table-striped table-hover'>
                <tr>
                    <th>ID</th>
                    <th>Funcionario</th>
                    <th>Processo</th>
                    <th>Tipo Operação</th>
                    <th>Data</th>
                    <th>Peso</th>
                    <th>Descrição</th>
                    <th>Edição</th>
                    <th>Status</th>
                </tr>
                <?= $view->renderizarTabela() ?>
            </table>
        </div>
    </form>

    <script>
        function preencherCampos(evento) {
            let botaoEditar = evento.target;


            let tdFuncionarioMovimento = document.querySelector(`td[name="tdFuncionarioMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#funcionarioMovimento').value = tdFuncionarioMovimento.textContent;

            let tdProcessoMovimento = document.querySelector(`td[name="tdProcessoMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#processoMovimento').value = tdProcessoMovimento.textContent;

            let tdTipoOperacaoMovimento = document.querySelector(`td[name="tdTipoOperacaoMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#tipoOperacaoMovimento').checked = tdDataMovimento.textContent;

            let tdDataMovimento = document.querySelector(`td[name="tdDataMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#dataMovimento').value = tdDataMovimento.textContent;

            let tdPesoMovimento = document.querySelector(`td[name="tdPesoMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#pesoMovimento').value = parseInt(tdPesoMovimento.textContent);

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