<?php
include_once "BaseModel.php";
class MovimentoModel extends BaseModel
{

    public $idFuncionarioMovimento;
    public $idProcessoMovimento;
    public $tipoOperacaoMovimento;
    public $dataMovimento;
    public $pesoMovimento;
    public $descMovimento;


    function __construct()
    {
        parent::__construct();
        $this->nomeTabela = "MOVIMENTO";
        $this->campoId = "MOVI_ID";
    }

    public function editarMovimento($id)
    {
        $campos = array("MOVI_DATE", "MOVI_PESO", "MOVI_DESC", "MOVI_TIPO", "MOVI_TIPR_ID", "MOVI_FUNC_ID");
        $valores = array($this->converterData($this->dataMovimento), $this->pesoMovimento, $this->descMovimento, $this->tipoOperacaoMovimento, $this->idProcessoMovimento, $this->idFuncionarioMovimento);
        $this->editar($campos, $valores, $id);
    }

    public function cadastrarMovimento()
    {
        $campos = array("MOVI_DATE", "MOVI_PESO", "MOVI_DESC", "MOVI_TIPO", "MOVI_TIPR_ID", "MOVI_FUNC_ID");
        $valores = array($this->converterData($this->dataMovimento), $this->pesoMovimento, $this->descMovimento, $this->tipoOperacaoMovimento, $this->idProcessoMovimento, $this->idFuncionarioMovimento);
        $this->inserir($campos, $valores);
    }

    public function converterData($data){
        //return "STR_TO_DATE('$data','%Y-%m-%d')";
        return $data;
    }
}
