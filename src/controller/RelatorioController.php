<?php
include "../model/FuncionarioModel.php";
include "../model/TipoMovimentoModel.php";
include "../model/RelatorioModel.php";
class RelatorioController
{
    private FuncionarioModel $funcionarioModel;
    private TipoMovimentoModel $tipoMovimentoModel;
    private RelatorioModel $relatorioModel;
    
    function __construct()
    {
        $this->funcionarioModel = new FuncionarioModel();
        $this->tipoMovimentoModel = new TipoMovimentoModel();
        $this->relatorioModel = new RelatorioModel();
    }

    public function listarFuncionarios(){
        
        $arrayFuncionario = $this->funcionarioModel->consultarTodos();

        if (mysqli_num_rows($arrayFuncionario) > 0) {
            return $arrayFuncionario->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
        
        return $arrayFuncionario;
    }

    public function listarTipoMovimento(){
        
        $arrayTipoMovimento = $this->tipoMovimentoModel->consultarTodos();

        if (mysqli_num_rows($arrayTipoMovimento) > 0) {
            return $arrayTipoMovimento->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
        
        return $arrayTipoMovimento;
    }

    public function listarDadosRelatorio($funcionario, $tipo_movimento, $tipo_data){
        
        
        if($funcionario === "" && $tipo_movimento === "" && $tipo_data === ""){
            $arrayRelatorioModel = 
                $this->relatorioModel->consultarTodos();
        }else{
            $arrayRelatorioModel = 
                $this->relatorioModel->consultarComFiltro(
                    $funcionario, $tipo_movimento, $tipo_data);
        }
        

        if (mysqli_num_rows($arrayRelatorioModel) > 0) {
            return $arrayRelatorioModel->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
        
        return $arrayRelatorioModel;
    }
}

?>