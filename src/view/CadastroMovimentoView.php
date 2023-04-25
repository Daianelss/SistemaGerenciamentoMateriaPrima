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
        $nomeMovimento = !isset($_POST["nomeMovimento"]) ? null : $_POST["nomeMovimento"];
        $descMovimento = !isset($_POST["descMovimento"]) ? null : $_POST["descMovimento"];
        $idMovimento = !isset($_POST["idMovimento"]) ? null : $_POST["idMovimento"];
        $idMovimentoAtivo = !isset($_POST["idMovimentoAtivo"]) ? null : $_POST["idMovimentoAtivo"];
        $idMovimentoInativo = !isset($_POST["idMovimentoInativo"]) ? null : $_POST["idMovimentoInativo"];

        if ($salvar != null && $idMovimento != null) {
            $this->movimentoController->editarMovimento($nomeMovimento, $descMovimento, $idMovimento);
        } else if ($salvar != null) {
            $this->movimentoController->cadastrarMovimento($nomeMovimento, $descMovimento);
        }

        if ($idMovimentoAtivo != null) {
            $this->movimentoController->alterarStatus(1, $idMovimentoAtivo);
        } else if ($idMovimentoInativo != null) {
            $this->movimentoController->alterarStatus(0, $idMovimentoInativo);
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
            echo "<td>" . $row["TIMP_ID"] . "</td>";
            echo "<td name='tdNomeMovimento' id='" . $row["TIMP_ID"] . "'>" . $row["TIMP_NOME"] . "</td>";
            echo "<td name='tdDescMovimento' id='" . $row["TIMP_ID"] . "'>" . $row["TIMP_DESCRICAO"] . "</td>";
            echo '<td> <button type="button" id="editar" onclick="preencherCampos(event)" name="idMovimentoEditar" value="' . $row["TIMP_ID"] . '" class="btn-editar btn btn-primary">Editar</button>';

            if ($row["TIMP_STATUS"] == "1")
                echo '<td> <button type="submit" name="idMovimentoAtivo" class="btn btn-status btn-success" value="' . $row["TIMP_ID"] . '">Ativado</button>';
            else
                echo '<td> <button type="submit" name="idMovimentoInativo" class="btn btn-status btn-danger" value="' . $row["TIMP_ID"] . '">Inativo</button>';
            echo "</tr>";
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
