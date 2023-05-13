<?php
include_once "BaseModel.php";
class ProcessoModel extends BaseModel{

    public $nomeProcesso;
    public $idProcesso;
    public $statusProcesso;

    function __construct(){
        parent::__construct();
        $this->nomeTabela = "TIPO_PROCESSO";
        $this->campoId = "TIPR_ID";
        $this->campoStatus = "TIPR_STATUS";
    }

    public function editarProcesso($id){
        $campos = array("TIPR_NOME");
        $valores = array($this->nomeProcesso); 

        $this->editar($campos, $valores, $id);
    }

    public function cadastrarProcesso(){
        $campos = array("TIPR_NOME", "TIPR_STATUS");
        $valores = array($this->nomeProcesso, "1");
        $this->inserir($campos, $valores);
    }


}

?>