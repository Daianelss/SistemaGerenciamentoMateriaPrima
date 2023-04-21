<?php

class bancacontroller
{

    function receberDados()
    {
        // Recebe os dados do formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $funcionario = $_POST["funcionario"];
            $dataEntrada = $_POST["dataEntrada"];
            $pesoEntrada = $_POST["pesoEntrada"];
            $dataSaida = $_POST["dataSaida"];
            $pesoSaida = $_POST["pesoSaida"];

            // Instancia o controller de cadastro e chama o método de cadastro
            $bancacontroller = new bancacontroller();
            $bancacontroller->cadastrarMovimento($funcionario, $dataEntrada, $pesoEntrada, $dataSaida, $pesoSaida);
        }
    }

    public function cadastrarMovimento($funcionario, $dataEntrada, $pesoEntrada, $dataSaida, $pesoSaida)
    {
        // Cria um novo objeto Funcionario com os dados recebidos
        $novomovimento = new Funcionario();
        $novomovimento->setFuncionario($funcionario);
        $novomovimento->setDataEntrada($dataEntrada);
        $novomovimento->setPesoEntrada($pesoEntrada);
        $novomovimento->setDataSaida($dataSaida);
        $novomovimento->setPesoSaida($pesoSaida);
    }

    public function gravarBanco()
    {
        include "../config/db.php";
        try {

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Verifica a conexão
            if (! $conn) {
                die("Falha na conexão: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO funcionarios (funcionario, data_entrada, peso_entrada, data_saida, peso_saida)
                    VALUES (:funcionario, :dataEntrada, :pesoEntrada, :dataSaida, :pesoSaida)";

            $stmt = mysqli_prepare($conn, $sql);

            // Bind dos parâmetros
            mysqli_stmt_bind_param($stmt, 'sssss', $this->funcionario, $this->dataEntrada, $this->pesoEntrada, $this->dataSaida, $this->pesoSaida);

            // Executa a query
            $result = mysqli_stmt_execute($stmt);

            // Fecha a conexão
            mysqli_close($conn);

            if ($result) {
                echo "Funcionário cadastrado com sucesso no banco de dados!";
            } else {
                echo "Erro ao cadastrar o funcionário no banco de dados: " . mysqli_error($conn);
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar o funcionário no banco de dados: " . $e->getMessage();
        }
    }
}

?>