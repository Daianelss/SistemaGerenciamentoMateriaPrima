<?php
require 'CadastroFuncionarioView.php';
$view = new CadastroFuncionarioView();
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Funcionário</title>
    <?php include '../view/bootstrap_head.php'; ?>
</head>

<header class="bg-secondary p-3">
    <h1 class="text-center mb-5 text-white">Cadastro de Funcionários</h1>
</header>

<body>

    <div class="container d-flex flex-row border border-dark mt-5 mb-5 pt-4 p-4">
    <form method="post" name="formSalvarEditar" action="cadastro-funcionario.php">
        <label class="mt-5 me-3" for="funcionario">Funcionário:</label>
        <input type="text" id="nomeFuncionario" name="nomeFuncionario" required><br>
        <input type="hidden" id="idFuncionario" name="idFuncionario"><br>
        <input class="btn btn-secondary" type="submit" value="Salvar" name="salvar">
        <button class="btn btn-secondary" onclick="window.location.href='http://localhost/src/pages/home/index.php'">Voltar</button>
    </form>
</div>
    <?= $view->dispararAcao() ?>
    
    <form method="post" name="formTabela" action="cadastro-funcionario.php">

        <table class='table table-secondary table-bordered container table-striped table-hover mt-5'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Edição</th>
                <th>Status</th>
            </tr>
            <?= $view->renderizarTabela() ?>
        </table>
    </form>

    <script>
        function preencherCampos(evento) {
            let botaoEditar = evento.target;

            let tdNomeFuncionario = document.querySelector(`td[name="tdNomeFuncionario"][id="${botaoEditar.value}"]`);
            document.querySelector('#nomeFuncionario').value = tdNomeFuncionario.textContent;
            document.querySelector('#idFuncionario').setAttribute('value', botaoEditar.value);
        }
    </script>

    <?php
    include '../view/bootstrap_foot.php';
    ?>

</body>

</html>