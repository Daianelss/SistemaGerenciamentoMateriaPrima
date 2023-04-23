<?php
session_start();

require "RelatorioView.php";

$view = new RelatorioView();

$funcionarios = $view->getRelatorioController()->listarFuncionarios();
$movimentos = $view->getRelatorioController()->listarTipoMovimento();
$relatorios = $view->consultarDadosRelatorio();

/*
$relatorios = [
  ['28/01/2015', '21.52', 'Pulseira', '22.01', '-0.49'],
  ['28/04/2017', '21.52', 'Colar', '22.01', '-0.49'],
  ['28/12/2019', '21.52', 'brinco', '22.01', '-0.49'],
  ['28/01/2020', '21.52', 'colar colorido', '22.01', '-0.49'],
  ['28/01/2021', '21.52', 'colar redondo', '22.01', '-0.49'],
  ['28/01/2022', '21.52', 'pulseira e brinco', '22.01', '-0.49'],
  ['28/01/2023', '21.52', '2 pulseiras', '22.01', '-0.49'],
  ['28/09/2023', '21.52', 'Pulseira azul', '22.01', '-0.49'],
];*/

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

<body>
  <h1 align="center">Sistema de Gerenciamento de Materiais</h>
    <form>
      <select name="funcionarios">
      <option value=''>Todos</option>
        <?php
        if(count($funcionarios) > 0){
          foreach ($funcionarios as $funcionario) {
            $id   = $funcionario['FUNC_ID'];
            $name = $funcionario['FUNC_NOME']; 
            echo "<option value='$id'>$name</option>";
          }
        }        
        ?>
      </select>

      <select name="movimentos">
      <option value=''>Todos</option>
        <?php
        if(count($movimentos) > 0){
          foreach ($movimentos as $movimento) {
            $id   = $movimento['TIMO_ID'];
            $name = $movimento['TIMO_NOME']; 
            echo "<option value='$id'>$name</option>";
          }
        }
        ?>

      </select>


      <button type="submit">Pesquisar</button>
    </form>
    <table border="5">
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
        <?php foreach ($relatorios as $relatorio): ?>


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


    <button>voltar</button>
    <button>imprimir</button>

    <?php include '../view/bootstrap_foot.php'; ?>

</body>


</html> */

