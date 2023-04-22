<?php
include "BaseModel.php";
class FuncionarioModel extends BaseModel{

    public $nomeFuncionario;
    public $idFuncionario;
    public $statusFuncionario;

    function __construct(){
        parent::__construct();
        $this->nomeTabela = "funcionario";
        $this->campoId = "FUNC_ID";
        $this->campoStatus = "FUNC_STATUS";
    }

    public function editarFuncionario($id){
        $campos = array("FUNC_NOME");
        $valores = array($this->nomeFuncionario); 

        $this->editar($campos, $valores, $id);
    }

    public function cadastrarFuncionario(){
        $campos = array("FUNC_NOME", "FUNC_STATUS");
        $valores = array($this->nomeFuncionario, "1");
        $this->inserir($campos, $valores);
    }


}

?>