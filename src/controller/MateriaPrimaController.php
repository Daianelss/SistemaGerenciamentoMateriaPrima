<?php
include "../model/MateriaPrimaModel.php";
class MateriaPrimaController
{
    private $materiaPrima;

    function __construct()
    {
        $this->materiaPrima = new MateriaPrimaModel();
    }

    public function cadastrarMateriaPrima($nomeMateriaPrima, $descMateriaPrima){
        $this->materiaPrima->nomeMateriaPrima = Utils::tratarInjection($nomeMateriaPrima);
        $this->materiaPrima->descMateriaPrima = Utils::tratarInjection($descMateriaPrima);
        $this->materiaPrima->cadastrarmateriaPrima();
   
    }

    public function editarMateriaPrima($nomeMateriaPrima, $descMateriaPrima, $idMateriaPrima){
        $this->materiaPrima->nomeMateriaPrima = Utils::tratarInjection($nomeMateriaPrima);
        $this->materiaPrima->descMateriaPrima = Utils::tratarInjection($descMateriaPrima);
        $this->materiaPrima->editarMateriaPrima($idMateriaPrima);
    }

    public function listarMateriaPrimas()
    {
        $result = $this->materiaPrima->consultarTodos();

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function alterarStatus($status, $id)
    {
        if ($status == 1) {
            $this->materiaPrima->desativar($id);
        } else {
            $this->materiaPrima->ativar($id);
        }
    }
}
