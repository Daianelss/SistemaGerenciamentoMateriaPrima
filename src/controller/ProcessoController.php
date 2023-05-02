<?php
include "../model/ProcessoModel.php";
class ProcessoController
{
    private $processo;

    function __construct()
    {
        $this->processo = new ProcessoModel();
    }

    public function cadastrarProcesso($nomeProcesso){
        $this->processo->nomeProcesso = Utils::tratarInjection($nomeProcesso);
        $this->processo->cadastrarprocesso();
    }

    public function editarProcesso($nomeProcesso, $idProcesso){
        $this->processo->nomeProcesso = Utils::tratarInjection($nomeProcesso);
        $this->processo->editarProcesso($idProcesso);
    }

    public function listarProcessos()
    {
        $result = $this->processo->consultarTodos();

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function alterarStatus($status, $id)
    {
        if ($status == 1) {
            $this->processo->desativar($id);
        } else {
            $this->processo->ativar($id);
        }
    }
}
