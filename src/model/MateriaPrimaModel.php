<?php
include_once "BaseModel.php";
class MateriaPrimaModel extends BaseModel{

    public $nomeMateriaPrima;
    public $idMateriaPrima;
    public $descMateriaPrima;
    public $statusMateriaPrima;

    function __construct(){
        parent::__construct();
        $this->nomeTabela = "TIPO_MATERIA_PRIMA";
        $this->campoId = "TIMP_ID";
        $this->campoStatus = "TIMP_STATUS";
    }

    public function editarMateriaPrima($id){
        $campos = array("TIMP_NOME", "TIMP_DESCRICAO");
        $valores = array($this->nomeMateriaPrima, $this->descMateriaPrima); 
        $this->editar($campos, $valores, $id);
    }

    public function cadastrarMateriaPrima(){
        $campos = array("TIMP_NOME", "TIMP_DESCRICAO", "TIMP_STATUS");
        $valores = array($this->nomeMateriaPrima, $this->descMateriaPrima, "1");
        $this->inserir($campos, $valores);
    }


}

?>