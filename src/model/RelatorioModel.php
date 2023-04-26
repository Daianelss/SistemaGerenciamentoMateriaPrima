<?php
include_once "BaseModel.php";
class RelatorioModel extends BaseModel{

    function __construct(){
        parent::__construct();
        $this->nomeTabela = "movimentacao";
        $this->campoId = "MOVI_ID";
    }

    public function consultarComFiltro($funcionario, $tipo_movimento, $tipo_data){

        $query = " select MOVI_ID, MOVI_DATE, MOVI_PESO, MOVI_DESC, MOVI_PESOSAIDA from movimentacao where 1 = 1";

        if($funcionario !== ""){
            $query = $query . " AND MOVI_FUNC_ID = $funcionario";
        }

        if($tipo_movimento !== ""){
            $query = $query . " AND MOVI_PROC_ID = $tipo_movimento";
        }

        if($tipo_data !== ""){
            $query = $query . " AND MOVI_DATE = '$tipo_data'";
        }
        
        return $this->executarDql($query);
    }
}

?>