<?php

session_start();
$relatorios = [
  ['28/01/2015', '21.52', 'Pulseira', '22.01', '-0.49'],
  ['28/04/2017', '21.52', 'Colar', '22.01', '-0.49'],
  ['28/12/2019', '21.52', 'brinco', '22.01', '-0.49'],
  ['28/01/2020', '21.52', 'colar colorido', '22.01', '-0.49'],
  ['28/01/2021', '21.52', 'colar redondo', '22.01', '-0.49'],
  ['28/01/2022', '21.52', 'pulseira e brinco', '22.01', '-0.49'],
  ['28/01/2023', '21.52', '2 pulseiras', '22.01', '-0.49'],
  ['28/09/2023', '21.52', 'Pulseira azul', '22.01', '-0.49'],
  ['28/01/2015', '21.52', 'Pulseira', '22.01', '-0.49'],
  ['28/01/2021', '21.52', 'colar redondo', '22.01', '-0.49'],
  ['28/01/2022', '21.52', 'pulseira e brinco', '22.01', '-0.49'],
  ['28/01/2023', '21.52', '2 pulseiras', '22.01', '-0.49'],
  ['28/09/2023', '21.52', 'Pulseira azul', '22.01', '-0.49'],
  ['28/01/2015', '21.52', 'Pulseira', '22.01', '-0.49'],
  ['28/01/2021', '21.52', 'colar redondo', '22.01', '-0.49'],
  ['28/01/2022', '21.52', 'pulseira e brinco', '22.01', '-0.49'],
  ['28/01/2023', '21.52', '2 pulseiras', '22.01', '-0.49'],
  ['28/09/2023', '21.52', 'Pulseira azul', '22.01', '-0.49'],
  ['28/01/2015', '21.52', 'Pulseira', '22.01', '-0.49'],
];

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
  <h1 class="text-center m-5 mx-auto">Sistema de Gerenciamento de Materiais</h1>
  <div class="justify-content-center">



    <form class="form-row m-5">
      <div class="mb-2">
        <label for="funcionarios">Funcionários:</label>
        <select class="form-row rounded" id="funcionarios">
          <option value="todos">Todos</option>
          <option value="joao">João</option>
          <option value="lucas">Lucas</option>
          <option value="matheus">Matheus</option>
        </select>
      </div>

      <div class="mb-2">
        <label for="materiais">Materiais:</label>
        <select class="form-row rounded" id="materiais">
          <option value="peroxido">Peroxido</option>
          <option value="politriz">Politriz</option>
          <option value="magneto">Magneto</option>
          <option value="rodio">Ródio</option>
          <option value="rodio">Ródio negro</option>
        </select>
      </div>

      <div>
        <label for="periodo">Periodo: </label>
        <input class="form-row rounded mb-2" type="date" min="2022-01-01" max="2030-01-01">
      </div>

      <button class="btn btn-secondary " type="submit">Pesquisar</button>

    </form>
  </div>

  <!--
      <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
        <input placeholder="Select date" type="text" id="example" class="form-row">
        <i class="fas fa-calendar input-prefix"></i>
      </div>
      <script>
      $('.datepicker').datepicker({
      inline: true
      });
      </script>
    -->



  <div class="m-5">
    <table class="table">
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
              <?= $relatorio[0] ?>
            </td>
            <td>
              <?= $relatorio[1] ?>
            </td>
            <td>
              <?= $relatorio[2] ?>
            </td>
            <td>
              <?= $relatorio[3] ?>
            </td>
            <td>
              <?= $relatorio[4] ?>
            </td>
          </tr>

        <?php endforeach; ?>
      </tbody>

    </table>

    <div class="container text-center">
      <div class="row">
        <div class="col">
          <button class="btn btn-secondary" onclick="window.location.href='http://localhost/src/pages/home/index.php'">Voltar</button>
        </div>
        <div class="col">
          <script language="javascript">
            function imprime(text) {
              text = document
              print(text)
            }
          </script>

          <form>
            <input class="btn btn-secondary" type="button" value="Imprimir" name="Imprimir" onclick="imprime()" />
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
  <?php include '../view/bootstrap_foot.php'; ?>


</body>

</html>

