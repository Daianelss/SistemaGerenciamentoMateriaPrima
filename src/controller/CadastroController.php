<?php
include "Utils.php";
include "../config/Conexao.php";
class CadastroController
{
    private $conexao;


    function receberDados($funcionario)
    {

        echo "Cadastro Controller <br>";
        $this->cadastrarfuncionario($funcionario);
        header("Location: ../view/cadastroview.php");
        exit();
    }

    public function cadastrarfuncionario($funcionario)
    {
        echo "Cadastro Funcionario <br>";
        echo "$funcionario";
        // Cria um novo objeto Funcionario com os dados recebidos

        $funcionario = addslashes($funcionario);
        echo $funcionario;
        $this->gravarBanco($funcionario);

    }


    public function gravarBanco($funcionario)
    {
        echo"gravar banco";
        try {
            $conexao = Conexao::conectar();


// Verifica a conexão
            if (!$conexao) {
                die("Falha na conexão: " . mysqli_connect_error());
            }
            echo "Conexão bem-sucedida"; // Mensagem exibida se a conexão for bem-sucedida

// Aqui você pode executar suas operações no banco de dados

            $funcionario = Utils::tratarInjection($funcionario);

            $sql = "INSERT INTO funcionario (FUNC_NOME)  VALUES ('$funcionario')";

            $stmt = mysqli_prepare($conexao, $sql);



            // Executa a query
            $result = mysqli_stmt_execute($stmt);

            // Fecha a conexão


            if ($result) {
                echo "Funcionário cadastrado com sucesso no banco de dados!";
            } else {
                echo "Erro ao cadastrar o funcionário no banco de dados: " . mysqli_error($conexao);
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar o funcionário no banco de dados: " . $e->getMessage();
        } finally {
            mysqli_close($conexao);
        }


    }
}

?>