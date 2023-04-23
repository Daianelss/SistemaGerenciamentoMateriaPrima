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
        if (isset($_POST["id"])) {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "Editar";
                // Chama o método para receber os dados do formulário
                $this->materiaPrimaController->dispararAcao($_POST["materiaPrima"], $_POST["id"]);
            }
        }

        // Verifica se o formulário foi enviados
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "Salvar";
            // Chama o método para receber os dados do formulário
            $this->materiaPrimaController->dispararAcao($_POST["materiaPrima"],$_POST["descricaoMateriaPrima"]);
        }
    }

    public function renderizarTabela()
    {
        $result = $this->materiaPrimaController->listarMateriaPrimas();

        // Iniciar a tabela HTML
        echo "<table class='table'>";
        echo "<tr><th>ID</th><th>Nome</th></tr>";
        // Loop através dos dados da tabela
        while ($row = mysqli_fetch_assoc($result)) {
            // Adicionar uma linha para cada registro
            echo "<tr>";
            echo "<td>" . $row["TIMP_ID"] . "</td>";
            echo "<td>" . $row["TIMP_NOME"] . "</td>";
            echo "<td>" . $row["TIMP_DESCRICAO"] . "</td>";
            echo '<td> <button id="editar" class="btn-editar btn btn-primary" data-id="' . $row["TIMP_ID"] . '">Editar</button>';

            if ($row["TIMP_STATUS"] == "1")
                echo '<td> <button class="btn btn-status btn-success" data-id="' . $row["TIMP_ID"] . '">Ativado</button>';
            else
                echo '<td> <button class="btn btn-status btn-danger" data-id="' . $row["TIMP_ID"] . '">Inativo</button>';
            echo "</tr>";
        }
        // Fechar a tabela HTML
        echo "</table>";
    }
}
