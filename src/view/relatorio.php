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
  <div>
  <h1 class ="container, row, col text-center">Sistema de Gerenciamento de Materiais</h>
</div>
    <form>
      <select class="form-row, border-primary border-3"  name="todos">
        <?php
        $funcionarios = array("Todos", "",);
        foreach ($funcionarios as $funcionario) {
          echo "<option value='$funcionario'>$funcionario</option>";
        }
        ?>
      </select>

      <select class="form-row, border-primary border-3" name="movimentos">
        <?php
        $movimentos = array("peróxido", "politriz", "magneto", "ródio");
        foreach ($movimentos as $movimento) {
          echo "<option value='$movimento'>$movimento</option>";
        }
        ?>

      </select>

      <input class= "form-row" type="date" min="2022-01-01" max="2030-01-01">

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


      <button class="btn btn-info" type="submit">Pesquisar</button>
    </form>
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
        <?php foreach ($relatorios as $relatorio): ?>


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

    <div >      
    <button class="btn btn-info" onclick="window.location.href='http://localhost/src/pages/home/index.php'">Voltar</button>
    </div>
    

    <div id="d">  
          <script language="javascript">
          function imprime (text) {
              text=document
              print(text)
          } 
          </script>

      <form>
        <input class="btn btn-info" type="button" value="Imprimir" name="Imprimir" onclick="imprime()"/>  
        </form>
        </div>    
    <?php include '../view/bootstrap_foot.php'; ?>

</body>


</html> 

