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
  <h1 align="center">Sistema de Gerenciamento de Materiais</h>
    <form action="www.google.com">
      <select name="funcionarios">
        <?php
        $funcionarios = array("Funcionarios", "João", "Lucas", "Bruno", "Carla");
        foreach ($funcionarios as $funcionario) {
          echo "<option value='$funcionario'>$funcionario</option>";
        }
        ?>
      </select>

      <select name="movimentos">
        <?php
        $movimentos = array("Movimento", "peróxido", "politriz", "magneto", "ródio");
        foreach ($movimentos as $movimento) {
          echo "<option value='$movimento'>$movimento</option>";
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
    <button> <a href="../pages/home/index.php" >Voltar</a> </button>
    </div>
    

    <div id="d" align = "right" >  
          <script language="javascript">
          function imprime (text) {
              text=document
              print(text)
          } 
          </script>

      <form>
        <input type="button" value="Imprimir" name="Imprimir" onclick="imprime()"/>  
        </form>
        </div>    
    <?php include '../view/bootstrap_foot.php'; ?>

</body>


</html> 

