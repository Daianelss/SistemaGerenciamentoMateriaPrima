<?php
include_once "BaseModel.php";
class TipoMovimentoModel extends BaseModel{

    function __construct(){
        parent::__construct();
        $this->nomeTabela = "tipo_movimentacao";
        $this->campoId = "TIMO_ID";
        $this->campoStatus = "TIMO_STATUS";
    }
}

?>