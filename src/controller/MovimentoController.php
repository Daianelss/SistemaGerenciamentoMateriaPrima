<?php
include "../model/MovimentoModel.php";
include "../model/FuncionarioModel.php";
include "../model/ProcessoModel.php";
class MovimentoController
{
    private $movimentoModel;
    private $funcionarioModel;
    private $processoModel;

    function __construct()
    {
        $this->movimentoModel = new MovimentoModel();
        $this->funcionarioModel = new FuncionarioModel();
        $this->processoModel = new ProcessoModel();
    }

    public function cadastrarMovimento($funcionarioMovimento, $processoMovimento, $tipoOperacaoMovimento, $dataMovimento, $pesoMovimento,$descMovimento){
        $this->movimentoModel->idFuncionarioMovimento = $funcionarioMovimento;
        $this->movimentoModel->idProcessoMovimento = $processoMovimento;
        $this->movimentoModel->tipoOperacaoMovimento = $tipoOperacaoMovimento;
        $this->movimentoModel->dataMovimento = $dataMovimento;
        $this->movimentoModel->pesoMovimento = $pesoMovimento;
        $this->movimentoModel->descMovimento = Utils::tratarInjection($descMovimento);
        $this->movimentoModel->cadastrarmovimento();
   
    }

    public function editarMovimento($funcionarioMovimento, $processoMovimento, $tipoOperacaoMovimento, $dataMovimento, $pesoMovimento,$descMovimento,$idMovimento){
        $this->movimentoModel->idFuncionarioMovimento = $funcionarioMovimento;
        $this->movimentoModel->idProcessoMovimento = $processoMovimento;
        $this->movimentoModel->tipoOperacaoMovimento = $tipoOperacaoMovimento;
        $this->movimentoModel->dataMovimento = $dataMovimento;
        $this->movimentoModel->pesoMovimento = $pesoMovimento;
        $this->movimentoModel->descMovimento = Utils::tratarInjection($descMovimento);
        $this->movimentoModel->editarMovimento($idMovimento);
    }

    public function deletarMovimento($idMovimento)
    {
        $this->movimentoModel->deletarMovimento($idMovimento);
    }


    public function listarMovimentos()
    {
        $joins = array(
            [
                'campoTabela' => "MOVI_FUNC_ID",
                'campoReferencia' => "FUNC_ID",
                'nomeTabela' => "FUNCIONARIO"
            ],
            [
                'campoTabela' => "MOVI_TIPR_ID",
                'campoReferencia' => "TIPR_ID",
                'nomeTabela' => "TIPO_PROCESSO"
            ] 
        );

        $result = $this->movimentoModel->consultarTodosInnerJoin($joins);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function listarFuncionarios(){
        
        $arrayFuncionario = $this->funcionarioModel->consultarTodos("FUNC_STATUS = 1");

        if (mysqli_num_rows($arrayFuncionario) > 0) {
            return $arrayFuncionario->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
        
        return $arrayFuncionario;
    }

    public function listarProcessos(){
        
        $arrayProcesso = $this->processoModel->consultarTodos();

        if (mysqli_num_rows($arrayProcesso) > 0) {
            return $arrayProcesso->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
        
        return $arrayProcesso;
    }

    public function alterarStatus($status, $id)
    {
        if ($status == 1) {
            $this->movimentoModel->desativar($id);
        } else {
            $this->movimentoModel->ativar($id);
        }
    }
}
