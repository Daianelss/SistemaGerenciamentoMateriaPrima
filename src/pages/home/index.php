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
    <a href="../../view/relatorio.php" class="btn btn-info">Relatório</a>
    <a href="../../view/cadastro-movimento.php" class="btn btn-info">Movimento</a>
    <a href="../../view/cadastro-funcionario.php" class="btn btn-info">Funcionários</a>
    <a href="../../view/cadastro-materia-prima.php" class="btn btn-info">Matéria Prima</a>


<!-- Botão para teste -->
    <a href="../../teste/teste.html" class="btn btn-danger">Testes</a>

    <?php
include '../../view/bootstrap_foot.php';

?>

</body>
</html>