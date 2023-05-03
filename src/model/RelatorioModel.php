<?php
include_once "BaseModel.php";
class RelatorioModel extends BaseModel{

    function __construct(){
        parent::__construct();
        $this->nomeTabela = "MOVIMENTO";
        $this->campoId = "MOVI_ID";
    }

    public function consultarComFiltro($funcionario, $processo, $tipo_data){

        $query = " select MOVI_ID, MOVI_DATE, MOVI_PESO, MOVI_DESC from movimento where 1 = 1";

        if($funcionario !== ""){
            $query = $query . " AND MOVI_FUNC_ID = $funcionario";
        }

        if($processo !== ""){
            $query = $query . " AND MOVI_TIPR_ID = $processo";
        }

        if($tipo_data !== ""){
            $query = $query . " AND MOVI_DATE = '$tipo_data'";
        }
        
        return $this->executarDql($query);
    }
}

?>