<?php
include "../controller/FuncionarioController.php";

class CadastroFuncionarioView
{
    private FuncionarioController $funcionarioController;

    function __construct()
    {
        $this->funcionarioController = new FuncionarioController();
    }

    public function dispararAcao()
    {
        $this->anularVaziosPost();

        $salvar = !isset($_POST["salvar"]) ? null : $_POST["salvar"];
        $nomeFuncionario = !isset($_POST["nomeFuncionario"]) ? null : $_POST["nomeFuncionario"];
        $idFuncionario = !isset($_POST["idFuncionario"]) ? null : $_POST["idFuncionario"];
        $idFuncionarioAtivo = !isset($_POST["idFuncionarioAtivo"]) ? null : $_POST["idFuncionarioAtivo"];
        $idFuncionarioInativo = !isset($_POST["idFuncionarioInativo"]) ? null : $_POST["idFuncionarioInativo"];

        if ($salvar != null && $idFuncionario != null) {
            $this->funcionarioController->editarFuncionario($nomeFuncionario, $idFuncionario);
        } else if ($salvar != null) {
            $this->funcionarioController->cadastrarFuncionario($nomeFuncionario);
        }

        if ($idFuncionarioAtivo != null) {
            $this->funcionarioController->alterarStatus(1, $idFuncionarioAtivo);
        } else if ($idFuncionarioInativo != null) {
            $this->funcionarioController->alterarStatus(0, $idFuncionarioInativo);
        } else {
            unset($_POST);
            return;
        }
        unset($_POST);

        header("Location: ../view/cadastro-funcionario.php");
    }

    public function renderizarTabela()
    {
        $result = $this->funcionarioController->listarFuncionarios();

        if ($result == null)
            return;

        // Loop através dos dados da tabela
        while ($row = mysqli_fetch_assoc($result)) {
            // Adicionar uma linha para cada registro
            echo "<tr>";
            echo "<td>" . $row["FUNC_ID"] . "</td>";
            echo "<td id='" . $row["FUNC_ID"] . "'>" . $row["FUNC_NOME"] . "</td>";
            echo '<td> <button type="button" id="editar" onclick="preencherCampos(event)" name="idFuncionarioEditar" value="' . $row["FUNC_ID"] . '" class="btn-editar btn btn-primary">Editar</button>';

            if ($row["FUNC_STATUS"] == "1")
                echo '<td> <button type="submit" name="idFuncionarioAtivo" class="btn btn-status btn-success" value="' . $row["FUNC_ID"] . '">Ativado</button>';
            else
                echo '<td> <button type="submit" name="idFuncionarioInativo" class="btn btn-status btn-danger" value="' . $row["FUNC_ID"] . '">Inativo</button>';
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
