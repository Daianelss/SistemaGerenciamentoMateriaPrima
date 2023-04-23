<?php
include "../model/MateriaPrimaModel.php";
class MateriaPrimaController
{
    private $materiaPrima;

    function __construct()
    {
        $this->materiaPrima = new MateriaPrimaModel();
    }

    function dispararAcao($nomeMateriaPrima, $descricaoMateriaPrima, $id = null)
    {
        $this->materiaPrima->nomeMateriaPrima = Utils::tratarInjection($nomeMateriaPrima);
        $this->materiaPrima->descricaoMateriaPrima = Utils::tratarInjection($descricaoMateriaPrima);
        $this->materiaPrima->idMateriaPrima = $id;

        if ($id != '') {
            echo "Editar MateriaPrimas <br>";
            $this->materiaPrima->editarMateriaPrima($id);
            header("Location: ../view/cadastro-materia-prima.php");
            exit();
        }

        echo "Cadastro Controller <br>";
        $this->materiaPrima->cadastrarmateriaPrima();
        header("Location: ../view/cadastro-materia-prima.php");
        exit();
    }

    public function listarMateriaPrimas()
    {
        $result = $this->materiaPrima->consultarTodos();

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return "Não foram encontrados registros na tabela.";
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
