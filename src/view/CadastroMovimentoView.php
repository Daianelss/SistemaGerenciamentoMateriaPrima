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
        $idDeletar = !isset($_POST["idDeletar"]) ? null : $_POST["idDeletar"];
        $funcionarioMovimento = !isset($_POST["funcionarioMovimento"]) ? null : $_POST["funcionarioMovimento"];
        $processoMovimento = !isset($_POST["processoMovimento"]) ? null : $_POST["processoMovimento"];
        $tipoOperacaoMovimento = !isset($_POST["tipoOperacaoMovimento"]) ? null : $_POST["tipoOperacaoMovimento"];
        $dataMovimento = !isset($_POST["dataMovimento"]) ? null : $_POST["dataMovimento"];
        $pesoMovimento = !isset($_POST["pesoMovimento"]) ? null : $_POST["pesoMovimento"];
        $descMovimento = !isset($_POST["descMovimento"]) ? null : $_POST["descMovimento"];
        $idMovimentoPrimaAtivo = !isset($_POST["idMovimentoPrimaAtivo"]) ? null : $_POST["idMovimentoPrimaAtivo"];
        $idMovimentoPrimaInativo = !isset($_POST["idMovimentoPrimaInativo"]) ? null : $_POST["idMovimentoPrimaInativo"];

        $idMovimento = !isset($_POST["idMovimento"]) ? null : $_POST["idMovimento"];

        if ($salvar != null && $idMovimento != null) {
            $this->movimentoController->editarMovimento($funcionarioMovimento, $processoMovimento, $tipoOperacaoMovimento, $dataMovimento, $pesoMovimento, $descMovimento, $idMovimento);
        } else if ($salvar != null) {
            $this->movimentoController->cadastrarMovimento($funcionarioMovimento, $processoMovimento, $tipoOperacaoMovimento, $dataMovimento, $pesoMovimento, $descMovimento);
        } else if ($idDeletar != null) {
            $this->movimentoController->deletarMovimento($idDeletar);
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
            echo "<td name='tdFuncionarioMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_FUNC_ID"] . "</td>";
            echo "<td name='tdProcessoMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_TIPR_ID"] . "</td>";
            echo "<td name='tdTipoOperacaoMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_TIPO"] . "</td>";
            echo "<td name='tdDataMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_DATE"] . "</td>";
            echo "<td name='tdPesoMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_PESO"] . "</td>";
            echo "<td name='tdDescMovimento' id='" . $row["MOVI_ID"] . "'>" . $row["MOVI_DESC"] . "</td>";

            echo '<td> <button type="button" id="editar" onclick="preencherCampos(event)" name="idMovimentoEditar" value="' . $row["MOVI_ID"] . '" class="btn-editar btn btn-primary">Editar</button>';
            echo '<td> <button type="submit" id="deletar" name="idDeletar" value="' . $row["MOVI_ID"] . '" class="btn-deletar btn btn-primary">Deletar</button>';
        }
    }

    public function getFuncionarios()
    {
        return $this->movimentoController->listarFuncionarios();
    }

    public function getProcessos()
    {
        return $this->movimentoController->listarProcessos();
    }

    public function anularVaziosPost()
    {
        foreach ($_POST as $value) {
            if (empty($value))
                $value = null;
        }
    }
}
