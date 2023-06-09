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
    <link rel="stylesheet" href="../css/main.css">
</head>
<header class="bg-secondary p-3">
    <h1 class="text-center mb-5 text-black">Cadastro de tipo de Matéria Prima</h1>
</header>

<body>
    <div class="container border border-dark mt-5 mb-5 pt-4 p-4">
        <form method="post" name="formSalvarEditar" action="cadastro-materia-prima.php">
            <div class="d-flex flex-row mb-3 mt-5">
                <div class="ms-2 me-5">
                    <label for="nomeMateriaPrima">Nome:</label>
                    <input type="text" id="nomeMateriaPrima" name="nomeMateriaPrima" required><br>
                </div>
                <div class="ms-2 me-3">
                    <label for="descMateriaPrima">Descrição:</label>
                    <input type="text" id="descMateriaPrima" name="descMateriaPrima" required><br>
                    <input type="hidden" id="idMateriaPrima" name="idMateriaPrima"><br>
                </div>
            </div>
            <div class="d-flex justify-content-start">
                <input class="btn btn-secondary ms-3 mt-2" onclick="return confirm('Confirmar?')" type="submit" value="Salvar" name="salvar">
                <a class="btn btn-secondary ms-3 mt-2" href="http://localhost/src/pages/home/index.php">Voltar</a>
            </div>
        </form>
    </div>


    <?= $view->dispararAcao() ?>


    <form method="post" name="formTabela" action="cadastro-materia-prima.php">
        <div id="rolagem">
            <table class='table table-secondary table-bordered table-striped table-hover'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Edição</th>
                    <th>Status</th>
                </tr>
                <?= $view->renderizarTabela() ?>
            </table>
        </div>
    </form>
    </div>
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