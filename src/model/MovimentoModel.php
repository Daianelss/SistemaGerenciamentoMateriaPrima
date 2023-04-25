<?php
include_once "BaseModel.php";
class MovimentoModel extends BaseModel{

    public $nomeMovimento;
    public $idMovimento;
    public $descMovimento;
    public $statusMovimento;

    function __construct(){
        parent::__construct();
        $this->nomeTabela = "TIPO_MATERIA_PRIMA";
        $this->campoId = "TIMP_ID";
        $this->campoStatus = "TIMP_STATUS";
    }

    public function editarMovimento($id){
        $campos = array("TIMP_NOME", "TIMP_DESCRICAO");
        $valores = array($this->nomeMovimento, $this->descMovimento); 
        $this->editar($campos, $valores, $id);
    }

    public function cadastrarMovimento(){
        $campos = array("TIMP_NOME", "TIMP_DESCRICAO", "TIMP_STATUS");
        $valores = array($this->nomeMovimento, $this->descMovimento, "1");
        $this->inserir($campos, $valores);
    }


}

?>