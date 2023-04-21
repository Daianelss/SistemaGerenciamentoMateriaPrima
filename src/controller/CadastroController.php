<?php
include "Utils.php";
include "../config/Conexao.php";
class CadastroController
{
    private $conexao;
    private $funcionario;
    private $idFuncionario;

    function __construct()
    {
        
    }

    function receberDados($funcionario, $id = null)
    {
        $this->funcionario = Utils::tratarInjection($funcionario);
        $this->idFuncionario = $id;
        if ($id != '') {
            echo "Editar Funcionarios <br>";
            $this->editarFuncionario();
            header("Location: ../view/cadastroview.php");
            exit();
        }

        echo "Cadastro Controller <br>";
        $this->cadastrarfuncionario();
        header("Location: ../view/cadastroview.php");
        exit();
    }

    public function cadastrarfuncionario()
    {
        echo "Cadastro Funcionario <br>";
        echo $this->funcionario;

        // Cria um novo objeto Funcionario com os dados recebidos
        echo $this->funcionario;
        $this->gravarBanco();
    }

    public function gravarBanco()
    {
        echo "gravar banco";
        try {
            $this->conexao = Conexao::conectar();


            // Verifica a conexão
            if (!$this->conexao) {
                die("Falha na conexão: " . mysqli_connect_error());
            }

            // Aqui você pode executar suas operações no banco de dados
            $sql = "INSERT INTO funcionario (FUNC_NOME)  VALUES ('$this->funcionario')";

            $stmt = mysqli_prepare($this->conexao, $sql);



            // Executa a query
            $result = mysqli_stmt_execute($stmt);

            // Fecha a conexão


            if ($result) {
                echo "Funcionário cadastrado com sucesso no banco de dados!";
            } else {
                echo "Erro ao cadastrar o funcionário no banco de dados: " . mysqli_error($this->conexao);
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar o funcionário no banco de dados: " . $e->getMessage();
        } finally {
            mysqli_close($this->conexao);
        }
    }


    public function listarFuncionarios()
    {

        try {
            $this->conexao = Conexao::conectar();

            // Verifica a conexão
            if (!$this->conexao) {
                die("Falha na conexão: " . mysqli_connect_error());
            }

            // Aqui você pode executar suas operações no banco de dados
            $sql = "SELECT FUNC_ID, FUNC_NOME FROM funcionario";

            $result = mysqli_query($this->conexao, $sql);

            if (mysqli_num_rows($result) > 0) {
                return $result;
            } else {
                return "Não foram encontrados registros na tabela.";
            }
        } catch (PDOException $e) {
            echo "Erro ao listar os funcionários no banco de dados: " . $e->getMessage();
        } finally {
            mysqli_close($this->conexao);
        };
    }


    public function editarFuncionario()
    {
        echo "Editar Funcionario <br>";
        $this->editarBanco();
    }

    public function editarBanco()
    {
        echo "Editar banco";
        try {
            $this->conexao = Conexao::conectar();

            // Verifica a conexão
            if (!$this->conexao) {
                die("Falha na conexão: " . mysqli_connect_error());
            }
            echo "Conexão bem-sucedida"; // Mensagem exibida se a conexão for bem-sucedida

            // $sql = "INSERT INTO funcionario (FUNC_NOME)  VALUES ('$this->funcionario')";

            $sql = "UPDATE funcionario SET FUNC_NOME = ('$this->funcionario') WHERE FUNC_ID = ($this->idFuncionario);";

            $stmt = mysqli_prepare($this->conexao, $sql);

            // Executa a query
            $result = mysqli_stmt_execute($stmt);

            // Fecha a conexão

            if ($result) {
                echo "Funcionário cadastrado com sucesso no banco de dados!";
            } else {
                echo "Erro ao cadastrar o funcionário no banco de dados: " . mysqli_error($this->conexao);
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar o funcionário no banco de dados: " . $e->getMessage();
        } finally {
            mysqli_close($this->conexao);
        }
    }
}