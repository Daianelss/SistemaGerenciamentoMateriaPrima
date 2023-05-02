<?php
include_once "BaseModel.php";
class RelatorioModel extends BaseModel{

    function __construct(){
        parent::__construct();
        $this->nomeTabela = "movimento";
        $this->campoId = "MOVI_ID";
    }

    public function consultarComFiltro($funcionario, $processo){

        $query = " select MOVI_ID, MOVI_DATE, MOVI_PESO, MOVI_DESC, MOVI_PESOSAIDA from movimentacao where 1 = 1";

        if($funcionario !== ""){
            $query = $query . " AND MOVI_FUNC_ID = $funcionario";
        }

        if($processo !== ""){
            $query = $query . " AND MOVI_PROC_ID = $processo";
        }

        return $this->executarDql($query);
    }
}

?>