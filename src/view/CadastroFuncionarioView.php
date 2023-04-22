<?php
include "../controller/FuncionarioController.php";

class CadastroFuncionarioView
{
    private FuncionarioController $funcionarioController;

    function __construct()
    {
        $this->funcionarioController = new FuncionarioController();
    }

    public function validarFormulario()
    {
        if (isset($_POST["id"])) {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "Editar";
                // Chama o método para receber os dados do formulário
                $this->funcionarioController->receberDados($_POST["funcionario"], $_POST["id"]);
            }
        }

        // Verifica se o formulário foi enviados
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "Salvar";
            // Chama o método para receber os dados do formulário
            $this->funcionarioController->receberDados($_POST["funcionario"]);
        }
    }

    public function renderizarTabela()
    {
        $result = $this->funcionarioController->listarFuncionarios();

        // Iniciar a tabela HTML
        echo "<table class='table'>";
        echo "<tr><th>ID</th><th>Nome</th></tr>";
        // Loop através dos dados da tabela
        while ($row = mysqli_fetch_assoc($result)) {
            // Adicionar uma linha para cada registro
            echo "<tr onclick='selecionarId(" . $row["FUNC_ID"] . ")'>";
            echo "<td>" . $row["FUNC_ID"] . "</td>";
            echo "<td>" . $row["FUNC_NOME"] . "</td>";
            echo '<td> <button id="editar" class="btn-editar btn btn-primary" data-id="' . $row["FUNC_ID"] . '">Editar</button>';
            echo '<td> <button class="btn btn-primary" data-id="' . $row["FUNC_ID"] . '">Ativar/Desativar</button>';
            echo "</tr>";
        }
        // Fechar a tabela HTML
        echo "</table>";
    }
}
