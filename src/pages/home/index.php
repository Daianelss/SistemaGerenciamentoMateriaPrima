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
    <div class="mx-auto mt-5">

        <h2 class="text-center" style="height: 180px;">Escolha uma opção abaixo:</h2>
        <!-- Botões para as opções -->
        <div class="col-md-12 d-flex align-items-center justify-content-center">
            <a href="../../view/relatorio.php" class="btn btn-secondary" style="margin-right: 10px;">Relatório</a>
            <a href="../../view/banca.php" class="btn btn-secondary" style="margin-right: 10px;">Bancas</a>
            <a href="../../view/cadastro-funcionario.php" class="btn btn-secondary" style="margin-right: 10px;">Funcionários</a>
            <a href="../../view/cadastro-materia-prima.php" class="btn btn-secondary" style="margin-right: 10px;">Matéria Prima</a>
            <a href="peroxido.html" class="btn btn-secondary" style="margin-right: 10px;">Peroxido</a>
            <a href="politriz.html" class="btn btn-secondary" style="margin-right: 10px;">Politriz</a>
            <a href="conserto.html" class="btn btn-secondary" style="margin-right: 10px;">Conserto</a>
            <a href="rodio_branco.html" class="btn btn-secondary" style="margin-right: 10px;">Ródio Branco</a>
            <a href="rodio_negro.html" class="btn btn-secondary" style="margin-right: 10px;">Ródio Negro</a>
            <a href="magneto.html" class="btn btn-secondary" style="margin-right: 10px;">Magneto</a>
            <a href="peso_medio.html" class="btn btn-secondary" style="margin-right: 10px;">Peso Médio</a>
        </div>
    </div>



    <!-- Botão para teste 
    <a href="../../teste/teste.html" class="btn btn-danger">Testes</a>
    -->
    <?php
    include '../../view/bootstrap_foot.php';

    ?>
    <footer class="bg-secondary p-3 container-fluid fixed-bottom ">
        <h6 class="text-white mt-5 text-center  ">Todos os Direitos Reservados © 2023</h6>
    </footer>
</body>

</html>