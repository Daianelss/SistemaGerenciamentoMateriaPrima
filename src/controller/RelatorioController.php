<?php
include "../model/FuncionarioModel.php";
include "../model/ProcessoModel.php";
include "../model/RelatorioModel.php";
class RelatorioController
{
    private FuncionarioModel $funcionarioModel;
    private ProcessoModel $tipoMovimentoModel;
    private RelatorioModel $relatorioModel;
    
    function __construct()
    {
        $this->funcionarioModel = new FuncionarioModel();
        $this->tipoMovimentoModel = new ProcessoModel();
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

    public function listarProcesso(){
        
        $arrayProcesso = $this->tipoMovimentoModel->consultarTodos();

        if (mysqli_num_rows($arrayProcesso) > 0) {
            return $arrayProcesso->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
        
        return $arrayProcesso;
    }

    public function listarDadosRelatorio($funcionario, $processo){
        
        if($funcionario === "" && $processo === ""){
            $arrayRelatorioModel = 
                $this->relatorioModel->consultarTodos();
        }else{
            $arrayRelatorioModel = 
                $this->relatorioModel->consultarComFiltro(
                    $funcionario, $processo);
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