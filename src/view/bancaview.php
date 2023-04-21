<?php

class bancaview
{

    public function renderizarFormulario()
    {
        // HTML do formulário de cadastro
        echo '
<h1>Cadastro de Funcionário</h1>
<form method="post" action="../controller/bancacontroller.php">
    <label for="funcionario">Funcionário:</label>
    <input type="text" id="funcionario" name="funcionario" required><br>

    <label for="dataEntrada">Data de Entrada:</label>
    <input type="date" id="dataEntrada" name="dataEntrada" required><br>

    <label for="pesoEntrada">Peso de Entrada:</label>
    <input type="number" id="pesoEntrada" name="pesoEntrada" required><br>

    <label for="dataSaida">Data de Saída:</label>
    <input type="date" id="dataSaida" name="dataSaida" required><br>

    <label for="pesoSaida">Peso de Saída:</label>
    <input type="number" id="pesoSaida" name="pesoSaida" required><br>

    <input type="submit" value="Cadastrar">
</form>
';
    }
}

?>