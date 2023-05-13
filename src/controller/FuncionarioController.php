<?php
include "../model/FuncionarioModel.php";
class FuncionarioController
{
    private $funcionario;

    function __construct()
    {
        $this->funcionario = new FuncionarioModel();
    }

    public function cadastrarFuncionario($nomeFuncionario){
        $this->funcionario->nomeFuncionario = Utils::tratarInjection($nomeFuncionario);
        $this->funcionario->cadastrarfuncionario();
    }

    public function editarFuncionario($nomeFuncionario, $idFuncionario){
        $this->funcionario->nomeFuncionario = Utils::tratarInjection($nomeFuncionario);
        $this->funcionario->editarFuncionario($idFuncionario);
    }

    public function listarFuncionarios()
    {
        $result = $this->funcionario->consultarTodos();

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
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
