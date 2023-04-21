<?php
include "../controller/CadastroController.php";

class cadastroview
{

    public function renderizarFormulario()
    {
        // HTML do formulário de cadastro
        echo '
<h1>Cadastro de Funcionário</h1>
<form method="post">
    <label for="funcionario">Funcionário:</label>
    <input type="text" id="funcionario" name="funcionario" required><br>

    <input type="submit" value="Cadastrar">
</form>
';

        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "receber";
            // Instancia a classe cadastrocontroller
            $controller = new CadastroController();
            // Chama o método para receber os dados do formulário
            $controller->receberDados($_POST["funcionario"]);
        }
    }
}

?>