<?php
include "../model/MovimentoModel.php";
class MovimentoController
{
    private $movimento;

    function __construct()
    {
        $this->movimento = new MovimentoModel();
    }

    public function cadastrarMovimento($nomeMovimento, $descMovimento){
        $this->movimento->nomeMovimento = Utils::tratarInjection($nomeMovimento);
        $this->movimento->descMovimento = Utils::tratarInjection($descMovimento);
        $this->movimento->cadastrarmovimento();
   
    }

    public function editarMovimento($nomeMovimento, $descMovimento, $idMovimento){
        $this->movimento->nomeMovimento = Utils::tratarInjection($nomeMovimento);
        $this->movimento->descMovimento = Utils::tratarInjection($descMovimento);
        $this->movimento->editarMovimento($idMovimento);
    }

    public function listarMovimentos()
    {
        $result = $this->movimento->consultarTodos();

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function alterarStatus($status, $id)
    {
        if ($status == 1) {
            $this->movimento->desativar($id);
        } else {
            $this->movimento->ativar($id);
        }
    }
}
