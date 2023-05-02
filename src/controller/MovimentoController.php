<?php
include "../model/MovimentoModel.php";
class MovimentoController
{
    private $movimento;

    function __construct()
    {
        $this->movimento = new MovimentoModel();
    }

    public function cadastrarMovimento($funcionarioMovimento, $processoMovimento, $tipoOperacaoMovimento, $dataMovimento, $pesoMovimento,$descMovimento){
        $this->movimento->idFuncionarioMovimento = $funcionarioMovimento;
        $this->movimento->idProcessoMovimento = $processoMovimento;
        $this->movimento->tipoOperacaoMovimento = $tipoOperacaoMovimento;
        $this->movimento->dataMovimento = $dataMovimento;
        $this->movimento->pesoMovimento = $pesoMovimento;
        $this->movimento->descMovimento = Utils::tratarInjection($descMovimento);
        $this->movimento->cadastrarmovimento();
   
    }

    public function editarMovimento($funcionarioMovimento, $processoMovimento, $tipoOperacaoMovimento, $dataMovimento, $pesoMovimento,$descMovimento,$idMovimento){
        $this->movimento->idFuncionarioMovimento = $funcionarioMovimento;
        $this->movimento->idProcessoMovimento = $processoMovimento;
        $this->movimento->tipoOperacaoMovimento = $tipoOperacaoMovimento;
        $this->movimento->dataMovimento = $dataMovimento;
        $this->movimento->pesoMovimento = $pesoMovimento;
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
