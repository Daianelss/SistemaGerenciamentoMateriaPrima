<?php
require 'CadastroMovimentoView.php';
$view = new CadastroMovimentoView();
$funcionarios = $view->getFuncionarios();
$processos = $view->getProcessos();
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Materia Prima</title>
    <?php include '../view/bootstrap_head.php'; ?>
    <link rel="stylesheet" href="../css/main.css">
</head>
<header class="bg-secondary p-3">
    <h1 class="text-center mb-5 text-black">Cadastro de tipo de Matéria Prima</h1>
</header>

<body>

    <div class="container border border-dark mt-5 mb-5">
        <form method="post" name="formSalvarEditar" action="cadastro-movimento.php">
            <div class="d-flex flex-row mb-3 mt-5">

            <select class="form-row border-secondary border-2 d-print-none me-3" name="funcionarios" required>
            <?php
            if (count($funcionarios) > 0) {
              foreach ($funcionarios as $funcionario) {
                $id   = $funcionario['FUNC_ID'];
                $name = $funcionario['FUNC_NOME'];
                echo "<option value='$id'>$name</option>";
              }
            }
            ?>
          </select>

          <select class="form-row, border-secondary border-2 d-print-none" name="movimentos" required>
            <?php
            if (count($processos) > 0) {
              foreach ($processos as $processo) {
                $id   = $processo['TIPR_ID'];
                $name = $processo['TIPR_NOME'];
                echo "<option value='$id'>$name</option>";
              }
            }
            ?>
          </select>
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
                    <input class="ms-2 me-3" type="text" id="pesoMovimento" name="pesoMovimento" required><br>
                </div>
                <div>
                    <label for="descMovimento">Descrição:</label>
                    <input type="text" id="descMovimento" name="descMovimento" required><br>
                </div>
                <input type="hidden" id="idMovimento" name="idMovimento"><br>
            </div>
            <div class="mb-4">
                
                <input class="btn btn-secondary ms-3 mt-2" onclick="return confirm('Confirmar?')" type="submit" value="Salvar" name="salvar">
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
                    <th>Deletar</th>
                </tr>
                <?= $view->renderizarTabela() ?>
            </table>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $("#pesoMovimento").mask('##0.00', {
                reverse: true
            });
        });

        function preencherCampos(evento) {
            let botaoEditar = evento.target;


            let tdFuncionarioMovimento = document.querySelector(`td[name="tdFuncionarioMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#funcionarioMovimento').value = tdFuncionarioMovimento.textContent;

            let tdProcessoMovimento = document.querySelector(`td[name="tdProcessoMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#processoMovimento').value = tdProcessoMovimento.textContent;

            let tdTipoOperacaoMovimento = document.querySelector(`td[name="tdTipoOperacaoMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector(`[name="tipoOperacaoMovimento"][type="radio"][value="${tdTipoOperacaoMovimento.textContent}"]`).checked = true;

            let tdDataMovimento = document.querySelector(`td[name="tdDataMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#dataMovimento').value = tdDataMovimento.textContent;

            let tdPesoMovimento = document.querySelector(`td[name="tdPesoMovimento"][id="${botaoEditar.value}"]`);
            document.querySelector('#pesoMovimento').value = tdPesoMovimento.textContent;

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