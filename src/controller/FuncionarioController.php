<?php
include "../model/FuncionarioModel.php";
class FuncionarioController
{
    private $funcionario;

    function __construct()
    {
        $this->funcionario = new FuncionarioModel();
    }

    function dispararAcao($nomeFuncionario, $id = null)
    {
        $this->funcionario->nomeFuncionario = Utils::tratarInjection($nomeFuncionario);
        $this->funcionario->idFuncionario = $id;

        if ($id != '') {
            echo "Editar Funcionarios <br>";
            $this->funcionario->editarFuncionario($id);
            header("Location: ../view/cadastro-funcionario.php");
            exit();
        }

        echo "Cadastro Controller <br>";
        $this->funcionario->cadastrarfuncionario();
        header("Location: ../view/cadastro-funcionario.php");
        exit();
    }

    public function listarFuncionarios()
    {
        $result = $this->funcionario->consultarTodos();

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return "Não foram encontrados registros na tabela.";
        }
    }

    public function alterarStatus($status, $id)
    {
        if ($status == 1) {
            $this->funcionario->desativar($id);
        } else {
            $this->funcionario->ativar($id);
        }
    }
}
