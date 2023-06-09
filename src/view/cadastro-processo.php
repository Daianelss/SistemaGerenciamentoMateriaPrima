<?php
require 'CadastroProcessoView.php';
$view = new CadastroProcessoView();
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Funcionário</title>
    <?php include '../view/bootstrap_head.php'; ?>
    <link rel="stylesheet" href="../css/main.css">
</head>

<header class="bg-secondary p-3">
    <h1 class="text-center mb-5 text-black">Cadastro de Processos</h1>
</header>

<body>

    <div class="container border border-dark mt-5 mb-5 pt-4 p-4">
        <form method="post" name="formSalvarEditar" action="cadastro-processo.php">
            <div class="d-flex flex-row mb-3 mt-5">
                <div class="ms-2 me-5">
                    <label for="processo">Processo:</label>
                    <input type="text" id="nomeProcesso" name="nomeProcesso" required><br>
                    <input type="hidden" id="idProcesso" name="idProcesso"><br>
                </div>
            </div>
            <div class="d-flex justify-content-left mt-5 mb-3">
                <input class="btn btn-secondary ms-3 mt-2" onclick="return confirm('Confirmar?')" type="submit" value="Salvar" name="salvar">
                <a class="btn btn-secondary ms-3 mt-2" href="http://localhost/src/pages/home/index.php">Voltar</a>

            </div>
        </form>
    </div>

    <?= $view->dispararAcao() ?>

    <form method="post" name="formTabela" action="cadastro-processo.php">
        <div id="rolagem">
            <table class='table table-secondary table-bordered table-striped table-hover'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
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

            let tdNomeProcesso = document.querySelector(`td[name="tdNomeProcesso"][id="${botaoEditar.value}"]`);
            document.querySelector('#nomeProcesso').value = tdNomeProcesso.textContent;
            document.querySelector('#idProcesso').setAttribute('value', botaoEditar.value);
        }
    </script>

    <?php
    include '../view/bootstrap_foot.php';
    ?>

</body>

</html>