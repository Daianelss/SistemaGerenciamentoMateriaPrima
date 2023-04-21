<?php
include '../view/bootstrap_head.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>Sistema de Controle de Bancas</title>
<!-- Apenas para facilitar na programação-->
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        #quebra {
            color: <?php echo ($quebra >= 0) ? 'green' : 'red'; ?>;
            font-weight: bold;
        }
    </style>

</head>
<body>
	<div>
		<h1>Sistema de Controle de Bancas</h1>
		<h3>Adicionar Entrada</h3>
		<form action="../controller/controller_banca.php" method="post">
			<label for="funcionario">Funcionário:</label> <input type="text"
				name="funcionario" id="funcionario"> <br> <br> <label
				for="data_entrada">Data de Entrada:</label> <input type="date"
				name="data_entrada" id="data_entrada"> <br> <br> <label
				for="peso_entrada">Peso de Entrada:</label> <input type="number"
				name="peso_entrada" id="peso_entrada"> <br> <br> <label
				for="data_saida">Data de Saída:</label> <input type="date"
				name="data_saida" id="data_saida"> <br> <br> <label for="peso_saida">Peso
				de Saída:</label> <input type="number" name="peso_saida"
				id="peso_saida"> <br> <br>
			<button type="submit">Adicionar Entrada</button>
		</form>
	</div>
	<br>
	<br>
	<h3>Entradas</h3>
	<table>
		<tr>
		
		
		<tr>
			<th>Funcionário</th>
			<th>Data de Entrada</th>
			<th>Peso de Entrada</th>
			<th>Data de Saída</th>
			<th>Peso de Saída</th>
			<th>Quebra</th>
		</tr>

    <?php
    include '../view/bootstrap_foot.php';

    ?>

</table>
</body>
</html>
