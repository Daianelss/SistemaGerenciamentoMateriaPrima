
<?php
class bancamodel
{
    private $funcionario;
    private $dataEntrada;
    private $pesoEntrada;
    private $dataSaida;
    private $pesoSaida;

    // Métodos getter e setter para os atributos

    public function getFuncionario()
    {
        return $this->funcionario;
    }

    public function setFuncionario($funcionario)
    {
        $this->funcionario = $funcionario;
    }

    public function getDataEntrada()
    {
        return $this->dataEntrada;
    }

    public function setDataEntrada($dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;
    }

    public function getPesoEntrada()
    {
        return $this->pesoEntrada;
    }

    public function setPesoEntrada($pesoEntrada)
    {
        $this->pesoEntrada = $pesoEntrada;
    }

    public function getDataSaida()
    {
        return $this->dataSaida;
    }

    public function setDataSaida($dataSaida)
    {
        $this->dataSaida = $dataSaida;
    }

    public function getPesoSaida()
    {
        return $this->pesoSaida;
    }

    public function setPesoSaida($pesoSaida)
    {
        $this->pesoSaida = $pesoSaida;
    }
}

?>