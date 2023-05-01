<?php
include "../model/MovimentoModel.php";
class MovimentoController
{
    private $movimento;

    function __construct()
    {
        $this->movimento = new MovimentoModel();
    }

    public function cadastrarMovimento($dataMovimento, $pesoMovimento, $descMovimento, $tipoMovimento, $idTipoMovimento, $idFuncionario){
        $this->movimento->dataMovimento = $dataMovimento;
        $this->movimento->pesoMovimento = $pesoMovimento;
        $this->movimento->descMovimento = Utils::tratarInjection($descMovimento);
        $this->movimento->tipoMovimento = $tipoMovimento;
        $this->movimento->idTipoMovimento = $idTipoMovimento;
        $this->movimento->idFuncionario = $idFuncionario;
        $this->movimento->cadastrarmovimento();
   
    }

    public function editarMovimento($dataMovimento, $pesoMovimento, $descMovimento, $tipoMovimento, $idTipoMovimento, $idFuncionario, $idMovimento){
        $this->movimento->dataMovimento = $dataMovimento;
        $this->movimento->pesoMovimento = $pesoMovimento;
        $this->movimento->descMovimento = Utils::tratarInjection($descMovimento);
        $this->movimento->tipoMovimento = $tipoMovimento;
        $this->movimento->idTipoMovimento = $idTipoMovimento;
        $this->movimento->idFuncionario = $idFuncionario;
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
