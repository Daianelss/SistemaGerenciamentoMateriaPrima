<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
<?php
require_once "../../config/db.php";
include '../../view/bootstrap_head.php';

?>
</head>
<body>
    <h1>Bem-vindo ao Sistema de Movimentos</h1>
    <h2>Escolha uma opção abaixo:</h2>
    <!-- Botões para as opções -->
    <a href="../../view/banca.php" class="btn btn-info">Bancas</a>
    <a href="../../view/cadastro.php" class="btn btn-info">Funcionários</a>
    <a href="materia_prima.html" class="btn btn-info">Matéria Prima</a>
    <a href="peroxido.html" class="btn btn-info">Peroxido</a>
    <a href="politriz.html" class="btn btn-info">Politriz</a>
    <a href="conserto.html" class="btn btn-info">Conserto</a>
    <a href="rodio_branco.html" class="btn btn-info">Ródio Branco</a>
    <a href="rodio_negro.html" class="btn btn-info">Ródio Negro</a>
    <a href="magneto.html" class="btn btn-info">Magneto</a>
    <a href="peso_medio.html" class="btn btn-info">Peso Médio</a>

<!-- Botão para teste -->
    <a href="../../teste/teste.html" class="btn btn-danger">Testes</a>

    <?php
include '../../view/bootstrap_foot.php';

?>

</body>
</html>