<?php
include "../model/FuncionarioModel.php";
include "../model/ProcessoModel.php";
include "../model/RelatorioModel.php";
class RelatorioController
{
    private FuncionarioModel $funcionarioModel;
    private ProcessoModel $tipoProcesso;
    private RelatorioModel $relatorioModel;
    
    function __construct()
    {
        $this->funcionarioModel = new FuncionarioModel();
        $this->tipoProcesso = new ProcessoModel();
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

    public function listarProcessos(){
        
        $arrayProcesso = $this->tipoProcesso->consultarTodos();

        if (mysqli_num_rows($arrayProcesso) > 0) {
            return $arrayProcesso->fetch_all(MYSQLI_ASSOC);
        } else {
            return array();
        }
        
        return $arrayProcesso;
    }


    public function listarDadosRelatorio($funcionario, $processo, $tipo_data){
        
        if($funcionario === "" && $processo === "" && $tipo_data === ""){

            $arrayRelatorioModel = 
                $this->relatorioModel->consultarTodos();
        }else{
            $arrayRelatorioModel = 
                $this->relatorioModel->consultarComFiltro(
                    $funcionario, $processo, $tipo_data);

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