<?php
include "../controller/MateriaPrimaController.php";

class CadastroMateriaPrimaView
{
    private MateriaPrimaController $materiaPrimaController;

    function __construct()
    {
        $this->materiaPrimaController = new MateriaPrimaController();
    }

    public function dispararAcao()
    {
        $this->anularVaziosPost();

        $salvar = !isset($_POST["salvar"]) ? null : $_POST["salvar"];
        $nomeMateriaPrima = !isset($_POST["nomeMateriaPrima"]) ? null : $_POST["nomeMateriaPrima"];
        $descMateriaPrima = !isset($_POST["descMateriaPrima"]) ? null : $_POST["descMateriaPrima"];
        $idMateriaPrima = !isset($_POST["idMateriaPrima"]) ? null : $_POST["idMateriaPrima"];
        $idMateriaPrimaAtivo = !isset($_POST["idMateriaPrimaAtivo"]) ? null : $_POST["idMateriaPrimaAtivo"];
        $idMateriaPrimaInativo = !isset($_POST["idMateriaPrimaInativo"]) ? null : $_POST["idMateriaPrimaInativo"];

        if ($salvar != null && $idMateriaPrima != null) {
            $this->materiaPrimaController->editarMateriaPrima($nomeMateriaPrima, $descMateriaPrima, $idMateriaPrima);
        } else if ($salvar != null) {
            $this->materiaPrimaController->cadastrarMateriaPrima($nomeMateriaPrima, $descMateriaPrima);
        }

        if ($idMateriaPrimaAtivo != null) {
            $this->materiaPrimaController->alterarStatus(1, $idMateriaPrimaAtivo);
        } else if ($idMateriaPrimaInativo != null) {
            $this->materiaPrimaController->alterarStatus(0, $idMateriaPrimaInativo);
        } else {
            unset($_POST);
            return;
        }
        unset($_POST);

        header("Location: ../view/cadastro-materia-prima.php");
    }

    public function renderizarTabela()
    {
        $result = $this->materiaPrimaController->listarMateriaPrimas();

        if ($result == null)
            return;

        // Loop através dos dados da tabela
        while ($row = mysqli_fetch_assoc($result)) {
            // Adicionar uma linha para cada registro
            echo "<tr>";
            echo "<td>" . $row["TIMP_ID"] . "</td>";
            echo "<td name='tdNomeMateriaPrima' id='" . $row["TIMP_ID"] . "'>" . $row["TIMP_NOME"] . "</td>";
            echo "<td name='tdDescMateriaPrima' id='" . $row["TIMP_ID"] . "'>" . $row["TIMP_DESCRICAO"] . "</td>";
            echo '<td> <button type="button" id="editar" onclick="preencherCampos(event)" name="idMateriaPrimaEditar" value="' . $row["TIMP_ID"] . '" class="btn-editar btn btn-primary">Editar</button>';

            if ($row["TIMP_STATUS"] == "1")
                echo '<td> <button type="submit" name="idMateriaPrimaAtivo" class="btn btn-status btn-success" value="' . $row["TIMP_ID"] . '">Ativado</button>';
            else
                echo '<td> <button type="submit" name="idMateriaPrimaInativo" class="btn btn-status btn-danger" value="' . $row["TIMP_ID"] . '">Inativo</button>';
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
