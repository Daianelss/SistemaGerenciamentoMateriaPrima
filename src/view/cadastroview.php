<?php
include "../controller/CadastroController.php";

class cadastroview
{

    public function renderizarFormulario()
    {
        // HTML do formulário de cadastro
        echo '

<html>
<head>
    <title>Funcionario</title>';


include '../view/bootstrap_head.php';
echo '
</head>
<body>



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
    
    public function renderizarTabela(){
        
        $result = CadastroController::listarFuncionarios();
       
            // Iniciar a tabela HTML
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Nome</th></tr>";
            // Loop através dos dados da tabela
            while($row = mysqli_fetch_assoc($result)) {
                // Adicionar uma linha para cada registro
                echo "<tr onclick='selecionarId(" . $row["FUNC_ID"] . ")'>";
                echo "<td>" . $row["FUNC_ID"] . "</td>";
                echo "<td>" . $row["FUNC_NOME"] . "</td>";
                echo '<td> <button class="btn btn-primary" data-id="' . $row["FUNC_ID"] . '">Editar</button>';
                echo "</tr>";
            }
            // Fechar a tabela HTML
            echo "</table>";
            
 
            include '../view/bootstrap_foot.php';
            echo '         

</body>
</html>';
        echo "<script>
    const botoesEditar = document.querySelectorAll('.btn-primary');
    botoesEditar.forEach(botao => {
        botao.addEventListener('click', () => {
            const id = botao.dataset.id;
            const linha = botao.parentNode.parentNode;
            const nome = linha.querySelector('td:nth-child(2)').textContent;
            const form = document.querySelector('form');
            form.funcionario.value = nome;
            form.insertAdjacentHTML('beforeend', '<input type=\"hidden\" name=\"id\" value=\"' + id + '\">');
        });
    });
</script>";
        
        }
        
        
    }


?>