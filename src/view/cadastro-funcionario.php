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


    <form method="post" name="formSalvarEditar" action="cadastro-funcionario.php">
        <label class= "mt-5"for="funcionario">Funcionário:</label>
        <input type="text" id="nomeFuncionario" name="nomeFuncionario" required><br>
        <input type="hidden" id="idFuncionario" name="idFuncionario"><br>
        <input class= "btn btn-secondary" type="submit" value="Salvar" name="salvar">
    </form>

    <?= $view->dispararAcao() ?>

    <a href="../pages/home/index.php">Voltar</a>

    <form method="post" name="formTabela" action="cadastro-funcionario.php">

        <table class='table table-secondary table-striped table-hover mt-5'>
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