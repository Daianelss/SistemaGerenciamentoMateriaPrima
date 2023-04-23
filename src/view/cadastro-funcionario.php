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

<body>

    <h1>Cadastro de Funcionário</h1>
    <form method="post" name="formSalvarEditar" action="cadastro-funcionario.php">
        <label for="funcionario">Funcionário:</label>
        <input type="text" id="nomeFuncionario" name="nomeFuncionario" required><br>
        <input type="hidden" id="idFuncionario" name="idFuncionario"><br>
        <input type="submit" value="Salvar" name="salvar">
    </form>

    <?= $view->dispararAcao() ?>

    <form method="post" name="formTabela" action="cadastro-funcionario.php">

        <table class='table table-striped'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
            <?= $view->renderizarTabela() ?>
        </table>
    </form>

    <script>
        function preencherCampos(evento) {
            let elemento = evento.target;

            let td = document.querySelector(`td[id="${elemento.value}"]`);
            let inputNomeFuncionario = document.querySelector('#nomeFuncionario').value = td.textContent;
            document.querySelector('#idFuncionario').setAttribute('value', elemento.value);
        }
    </script>

    <?php
    include '../view/bootstrap_foot.php';
    ?>
</body>

</html>