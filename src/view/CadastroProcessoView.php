<?php
include "../controller/ProcessoController.php";

class CadastroProcessoView
{
    private ProcessoController $processoController;

    function __construct()
    {
        $this->processoController = new ProcessoController();
    }

    public function dispararAcao()
    {
        $this->anularVaziosPost();

        $salvar = !isset($_POST["salvar"]) ? null : $_POST["salvar"];
        $nomeProcesso = !isset($_POST["nomeProcesso"]) ? null : $_POST["nomeProcesso"];
        $idProcesso = !isset($_POST["idProcesso"]) ? null : $_POST["idProcesso"];
        $idProcessoAtivo = !isset($_POST["idProcessoAtivo"]) ? null : $_POST["idProcessoAtivo"];
        $idProcessoInativo = !isset($_POST["idProcessoInativo"]) ? null : $_POST["idProcessoInativo"];

        if ($salvar != null && $idProcesso != null) {
            $this->processoController->editarProcesso($nomeProcesso, $idProcesso);
        } else if ($salvar != null) {
            $this->processoController->cadastrarProcesso($nomeProcesso);
        }

        if ($idProcessoAtivo != null) {
            $this->processoController->alterarStatus(1, $idProcessoAtivo);
        } else if ($idProcessoInativo != null) {
            $this->processoController->alterarStatus(0, $idProcessoInativo);
        } else {
            unset($_POST);
            return;
        }
        unset($_POST);

        header("Location: ../view/cadastro-processo.php");
    }

    public function renderizarTabela()
    {
        $result = $this->processoController->listarProcessos();

        if ($result == null)
            return;
        // Loop através dos dados da tabela
        while ($row = mysqli_fetch_assoc($result)) {
            // Adicionar uma linha para cada registro
            echo "<tr>";
            echo "<td>" . $row["TIPR_ID"] . "</td>";
            echo "<td name='tdNomeProcesso' id='" . $row["TIPR_ID"] . "'>" . $row["TIPR_NOME"] . "</td>";
            echo '<td> <button type="button" id="editar" onclick="preencherCampos(event)" name="idProcessoEditar" value="' . $row["TIPR_ID"] . '" class="btn-editar btn btn-primary">Editar</button>';

            if ($row["TIPR_STATUS"] == "1")
                echo '<td> <button type="submit" onclick="return confirm(\'Inativar?\')" name="idProcessoAtivo" class="btn btn-status btn-success" value="' . $row["TIPR_ID"] . '">Ativado</button>';
            else
                echo '<td> <button type="submit" onclick="return confirm(\'Ativar?\')" name="idProcessoInativo" class="btn btn-status btn-danger" value="' . $row["TIPR_ID"] . '">Inativo</button>';
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
