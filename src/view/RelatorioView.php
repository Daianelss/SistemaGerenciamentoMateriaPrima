<?php

include "../controller/RelatorioController.php";

class RelatorioView
{
    private RelatorioController $relatorioController;
    private $filtro_funcionario;
    private $filtro_processo;

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
    }

    public function getRelatorioController()
    {
        return $this->relatorioController;
    }

    public function consultarDadosRelatorio()
    {
        return $this->relatorioController->listarDadosRelatorio(
            $this->filtro_funcionario,
            $this->filtro_processo);
    }
}
