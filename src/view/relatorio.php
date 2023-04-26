<?php
session_start();


require "RelatorioView.php";

$view = new RelatorioView();

$funcionarios = $view->getRelatorioController()->listarFuncionarios();
$movimentos = $view->getRelatorioController()->listarTipoMovimento();
$relatorios = $view->consultarDadosRelatorio();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatorio</title>
  <?php include '../view/bootstrap_head.php'; ?>
</head>
<header class="bg-secondary p-3">
  <h1 class="text-center mb-5 text-white">Sistema de Gerenciamento de Materiais</h1>
</header>

<body>
  <div>
    <div class="d-print-none">
      <div class="container border border-dark mt-5 mb-5 pt-4 p-4">
        <form>
          <select class="form-row, border-secondary border-2 d-print-none me-3" name="funcionarios">
            <option value=''>Todos</option>
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

          <select class="form-row, border-secondary border-2 d-print-none me-3" name="movimentos">
            <option value=''>Movimentos</option>
            <?php
            if (count($movimentos) > 0) {
              foreach ($movimentos as $movimento) {
                $id   = $movimento['TIMO_ID'];
                $name = $movimento['TIMO_NOME'];
                echo "<option value='$id'>$name</option>";
              }
            }
            ?>

          </select>

          <input name="datafiltro" class="form-row d-print-none me-3" type="date" min="1900-01-01" max="2030-01-01">

          <button class="btn btn-secondary d-print-none" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>
    <table class="table table-secondary table-bordered container table-striped table-houver mt-5 mb-5 ">
      <thead>
        <tr>
          <th>Data</th>
          <th>Peso Entrada</th>
          <th>Descrição</th>
          <th>Saída</th>
          <th>Quebra</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($relatorios as $relatorio) : ?>


          <tr>
            <td>
              <?= $relatorio["MOVI_DATE"] ?>
            </td>
            <td>
              <?= $relatorio["MOVI_PESO"] ?>
            </td>
            <td>
              <?= $relatorio["MOVI_DESC"] ?>
            </td>
            <td>
              <?= $relatorio["MOVI_PESOSAIDA"] ?>
            </td>
            <td>
              <?= $relatorio["MOVI_PESO"] - $relatorio["MOVI_PESOSAIDA"] ?>
            </td>
          </tr>

        <?php endforeach; ?>
      </tbody>

    </table>

    <div class="container text-center">
      <div class="row">
        <div class="col">
          <button class="btn btn-secondary d-print-none" onclick="window.location.href='http://localhost/src/pages/home/index.php'">Voltar</button>
        </div>
        <div class="col">
          <script language="javascript">
            function imprime(text) {
              text = document
              print(text)
            }
          </script>

          <form>
            <input class="btn btn-secondary d-print-none" type="button" value="Imprimir" name="Imprimir" onclick="imprime()" />
          </form>
        </div>
      </div>

    </div>
    <!--      
    <div class="btn btn-secondary">
      <div>
        <button onclick="window.location.href='http://localhost/src/pages/home/index.php'">Voltar</button>
      </div>


      <div id="d">
        <script language="javascript">
          function imprime(text) {
            text = document
            print(text)
          }
        </script>

        <form>
          <input type="button" value="Imprimir" name="Imprimir" onclick="imprime()" />
        </form>
      </div>

    </div>
        -->
  </div>
  <?php
  include '../view/bootstrap_foot.php';
  ?>

  <footer class="bg-secondary p-3 container-fluid fixed-bottom ">
    <h6 class="text-white mt-5 text-center  ">Todos os Direitos Reservados © 2023</h6>
  </footer>
</body>

</html>