<?php
include_once "BaseModel.php";
class MovimentoModel extends BaseModel
{

    public $idFuncionario;
    public $tipoMovimento;
    public $idTipoMovimento;
    public $dataMovimento;
    public $pesoMovimento;
    public $descMovimento;


    function __construct()
    {
        parent::__construct();
        $this->nomeTabela = "movimentacao";
        $this->campoId = "MOVI_ID";
    }

    public function editarMovimento($id)
    {
        $campos = array("MOVI_DATE", "MOVI_PESO", "MOVI_DESC", "MOVI_TIPO", "MOVI_TIMO_ID", "MOVI_FUNC_ID");
        $valores = array($this->converterData($this->dataMovimento), $this->pesoMovimento, $this->descMovimento, $this->tipoMovimento, $this->idTipoMovimento, $this->idFuncionario);
        $this->editar($campos, $valores, $id);
    }

    public function cadastrarMovimento()
    {
        $campos = array("MOVI_DATE", "MOVI_PESO", "MOVI_DESC", "MOVI_TIPO", "MOVI_TIMO_ID", "MOVI_FUNC_ID");
        $valores = array($this->converterData($this->dataMovimento), $this->pesoMovimento, $this->descMovimento, $this->tipoMovimento, $this->idTipoMovimento, $this->idFuncionario);
        $this->inserir($campos, $valores);
    }

    public function converterData($data){
        //return "STR_TO_DATE('$data','%Y-%m-%d')";
        return $data;
    }
}
