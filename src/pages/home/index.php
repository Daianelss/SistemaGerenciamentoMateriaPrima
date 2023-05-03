<!DOCTYPE html>
<html>

<head>
    <title>Página Inicial</title>
    <?php
    require_once "../../config/db.php";
    include '../../view/bootstrap_head.php';

    ?>
</head>
<header class="bg-secondary p-3">
    <h1 class="text-center mb-5 text-white">Bem-vindo ao Sistema de Movimentos</h1>
</header>

<body>
    <div class="container clearfix">
        <div class="mx-auto mt-5 border border-dark pt-5 pb-5 container">
            <h2 class="text-center" style="height: 190px;">Escolha uma opção abaixo:</h2>
            
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <button class="btn btn-secondary ms-3 mt-2" onclick="window.location.href='http://localhost/src/view/relatorio.php'" style="margin-right: 10px;">Relatório</button>
                <button class="btn btn-secondary ms-3 mt-2" onclick="window.location.href='http://localhost/src/view/cadastro-movimento.php'" style="margin-right: 10px;">Movimentos</button>
                <button class="btn btn-secondary ms-3 mt-2" onclick="window.location.href='http://localhost/src/view/cadastro-funcionario.php'" style="margin-right: 10px;">Funcionários</button>
                <button class="btn btn-secondary ms-3 mt-2" onclick="window.location.href='http://localhost/src/view/cadastro-materia-prima.php'" style="margin-right: 10px;">Matéria Prima</button>
                <button class="btn btn-secondary ms-3 mt-2" onclick="window.location.href='http://localhost/src/view/cadastro-processo.php'" style="margin-right: 10px;">Cadastro Processo</button>
            </div>

        </div>
    </div>

    <?php
    include '../../view/bootstrap_foot.php';
    ?>

    <footer class="bg-secondary p-3 container-fluid fixed-bottom ">
        <h6 class="text-white mt-5 text-center  ">Todos os Direitos Reservados © 2023</h6>
    </footer>
</body>

</html>