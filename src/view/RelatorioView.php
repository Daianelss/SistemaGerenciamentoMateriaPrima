<?php

include "../controller/RelatorioController.php";

class RelatorioView
{
    private RelatorioController $relatorioController;
    private $filtro_funcionario;
    private $filtro_processo;
    private $filtro_tipo_data;


    function __construct()
    {        
        $this->relatorioController = new RelatorioController();
        
        $this->filtro_funcionario = "";
        if(isset($_GET['funcionarios'])){
            $this->filtro_funcionario = $_GET['funcionarios'];
        }

        $this->filtro_processo = "";
        if(isset($_GET['movimentos'])){
            $this->filtro_processo = $_GET['movimentos'];
        }
        
        $this->filtro_tipo_data = "";
        if(isset($_GET['datafiltro'])){
            $this->filtro_tipo_data = $_GET['datafiltro'];
        }
    }

    public function getRelatorioController()
    {
        return $this->relatorioController;
    }

    public function consultarDadosRelatorio()
    {
        return $this->relatorioController->listarDadosRelatorio(
            $this->filtro_funcionario,
            $this->filtro_processo,
            $this->filtro_tipo_data);

    }
}
