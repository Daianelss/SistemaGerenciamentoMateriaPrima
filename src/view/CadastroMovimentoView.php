<?php
include "../controller/MovimentoController.php";

class CadastroMovimentoView
{
    private MovimentoController $movimentoController;

    function __construct()
    {
        $this->movimentoController = new MovimentoController();
    }

    public function dispararAcao()
    {
        $this->anularVaziosPost();

        $salvar = !isset($_POST["salvar"]) ? null : $_POST["salvar"];
        $dataMovimento = !isset($_POST["dataMovimento"]) ? null : $_POST["dataMovimento"];
        $pesoMovimento = !isset($_POST["pesoMovimento"]) ? null : $_POST["pesoMovimento"];
        $descMovimento = !isset($_POST["descMovimento"]) ? null : $_POST["descMovimento"];
        $tipoMovimento = !isset($_POST["tipoMovimento"]) ? null : $_POST["tipoMovimento"];
        $idTipoMovimento = !isset($_POST["tipoMateriaPrimaMovimento"]) ? null : $_POST["tipoMateriaPrimaMovimento"];
        $idFuncionario = !isset($_POST["funcionarioMovimento"]) ? null : $_POST["funcionarioMovimento"];
        $idMovimento = !isset($_POST["idMovimento"]) ? null : $_POST["idMovimento"];
        $idMovimentoPrimaAtivo = !isset($_POST["idMovimentoPrimaAtivo"]) ? null : $_POST["idMovimentoPrimaAtivo"];
        $idMovimentoPrimaInativo = !isset($_POST["idMovimentoPrimaInativo"]) ? null : $_POST["idMovimentoPrimaInativo"];


        if ($salvar != null && $idMovimento != null) {
            $this->movimentoController->editarMovimento($dataMovimento, $pesoMovimento, $descMovimento, $tipoMovimento, $idTipoMovimento, $idFuncionario,$idMovimento);
        } else if ($salvar != null) {
            $this->movimentoController->cadastrarMovimento($dataMovimento, $pesoMovimento, $descMovimento, $tipoMovimento, $idTipoMovimento, $idFuncionario);
        }

        if ($idMovimentoPrimaAtivo != null) {
            $this->movimentoController->alterarStatus(1, $idMovimentoPrimaAtivo);
        } else if ($idMovimentoPrimaInativo != null) {
            $this->movimentoController->alterarStatus(0, $idMovimentoPrimaInativo);
        } else {
            unset($_POST);
            return;
        }
        unset($_POST);

        header("Location: ../view/cadastro-movimento.php");
    }

    public function renderizarTabela()
    {
        $result = $this->movimentoController->listarMovimentos();

        if ($result == null)
            return;

        // Loop através dos dados da tabela
        while ($row = mysqli_fetch_assoc($result)) {
            // Adicionar uma linha para cada registro
            echo "<tr>";
            echo "<td>" . $row["MOVI_ID"] . "</td>";
            echo "<td name='tdIdMateriaPrima' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_ID"] . "</td>";
            echo "<td name='tdTipoMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_TIMO_ID"] . "</td>";
            echo "<td name='tdMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_TIPO"] . "</td>";
            echo "<td name='tdDataMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_DATE"] . "</td>";
            echo "<td name='tdPesoMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_PESO"] . "</td>";
            echo "<td name='tdDescMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_DESC"] . "</td>";
            echo "<td name='tdIdFuncionario' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_FUNC_ID"] . "</td>";


            echo '<td> <button type="button" id="editar" onclick="preencherCampos(event)" name="idMovimentoEditar" value="' . $row["MOVI_ID"] . '" class="btn-editar btn btn-primary">Editar</button>';
        }
    }

    public function anularVaziosPost()
    {
        foreach ($_POST as $value) {
            if (empty($value))
                $value = null;
        }
    }
}
