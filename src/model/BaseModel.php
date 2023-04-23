<?php
include "../controller/Utils.php";
include "../config/Conexao.php";
class BaseModel
{
    private $conexao;
    public $nomeTabela;
    public $campoId;
    public $campoStatus;

    function __construct()
    {
        $this->conexao = Conexao::conectar();

        // Verifica a conexão
        if (!$this->conexao) {
            die("Falha na conexão: " . mysqli_connect_error());
        }
    }

    public function inserir($campos, $valores): bool
    {
        $sql = "INSERT INTO $this->nomeTabela (" . $this->juntarCampos($campos) . ") VALUES (" . $this->juntarValores($valores) . ")";
        return $this->executarDml($sql);
    }

    public function consultar($id)
    {
        $sql = "SELECT * FROM $this->nomeTabela WHERE $this->campoId = $id";
        return $this->executarDql($sql);
    }

    public function consultarTodos()
    {
        $sql = "SELECT * FROM $this->nomeTabela";
        return $this->executarDql($sql);
    }

    public function editar($campos, $valores, $id)
    {
        $sql = "UPDATE $this->nomeTabela SET " . $this->juntarCamposEditar($campos, $valores) . " WHERE $this->campoId = $id;";
        return $this->executarDml($sql);
    }

    public function desativar($id)
    {
        $sql = "UPDATE $this->nomeTabela SET $this->campoStatus = ('0') WHERE $this->campoId = $id;";
        return $this->executarDml($sql);
    }

    public function ativar($id)
    {
        $sql = "UPDATE $this->nomeTabela SET $this->campoStatus = ('1') WHERE $this->campoId = $id;";
        return $this->executarDml($sql);
    }

    //Data Manipulation Language - INSERT, DELETE e UPDATE
    public function executarDml($query): bool
    {
        try {
            var_dump($query);
            $stmt = mysqli_prepare($this->conexao, $query);
            return mysqli_stmt_execute($stmt);
        } catch (PDOException $exce) {
            echo "Erro ao executar DML";
        } finally {
            $this->fecharConexao();
        }
    }

    //Data Query Language - SELECT
    public function executarDql($query)
    {
        try {
            return mysqli_query($this->conexao, $query);
        } catch (PDOException $exce) {
            echo "Erro ao executar DQL!";
        } finally {
            $this->fecharConexao();
        }
    }

    private function fecharConexao()
    {
        mysqli_close($this->conexao);
    }

    private function juntarCampos($valores)
    {
        return implode(",", $valores);
    }

    private function juntarValores($valores)
    {
        $resultado = "'" . implode("','", $valores) . "'";
        return $resultado;
    }

    private function juntarCamposEditar($campos, $valores)
    {
        $resultado = "";
        for ($i = 0; $i < count($campos); $i++) {
            if ($i != (count($campos) - 1))
                $resultado = $resultado . $campos[$i] . " = '" . $valores[$i] . "',";
            else
                $resultado = $resultado . $campos[$i] . " = '" . $valores[$i] . "'";
        }

        return $resultado;
    }
}
