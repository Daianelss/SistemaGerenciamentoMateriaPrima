<?php
// Configuração de conexão com o banco de dadosdados
$servername = "localhost"; // Nome do servidor (geralmente é "localhost" ou "127.0.0.1" se estiver rodando localmente)
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "gerenciamentomateriaprima"; // Nome do banco de dados

// Cria a conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a conexão
if (! $conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
echo "Conexão bem-sucedida"; // Mensagem exibida se a conexão for bem-sucedida

// Aqui você pode executar suas operações no banco de dados

// Fecha a conexão com o banco de dados
mysqli_close($conn);

/*
 * try {
 * // Cria uma nova conexão com o banco de dados
 * $conn = new PDO("mysql:host=$servername", $username, $password);
 * // Define o modo de erro do PDO como exceção
 * $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 *
 * // SQL para criar o banco de dados
 * $sql = "CREATE DATABASE IF NOT EXISTS `$dbname`";
 * $conn->exec($sql);
 * echo "Banco de dados criado com sucesso!<br>";
 *
 * // Define o banco de dados a ser utilizado
 * $conn->exec("USE `$dbname`");
 *
 * // SQL para criar a tabela FUNCIONARIO
 * $sql = "CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`FUNCIONARIO` (
 * `FUNC_ID` INT NOT NULL,
 * `FUNC_NOME` VARCHAR(45) NULL,
 * PRIMARY KEY (`FUNC_ID`));";
 *
 * $conn->exec($sql);
 * echo "Tabela FUNCIONARIO criada com sucesso!<br>";
 *
 * //SQL para criar a tabela TIPO_MOVIMENTACAO
 * $sql = "CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`TIPO_MOVIMENTACAO` (
 * `TIMO_ID` INT NOT NULL,
 * `TIMO_NOME` VARCHAR(45) NULL,
 * PRIMARY KEY (`TIMO_ID`))
 * ;";
 * $conn->exec($sql);
 * echo "Tabela TIPO_MOVIMENTACAO criado<br>";
 *
 *
 * //SQL para criar a tabela MOVIMENTACAO
 * $sql = "CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`MOVIMENTACAO` (
 * `MOVI_ID` INT NOT NULL AUTO_INCREMENT,
 * `MOVI_DATE` DATE NOT NULL,
 * `MOVI_PESO` DOUBLE NULL,
 * `MOVI_DESC` VARCHAR(300) NULL,
 * `MOVI_PESOSAIDA` DOUBLE NULL,
 * `MOVI_PROC_ID` INT NULL,
 * `MOVI_FUNC_ID` INT NULL,
 * PRIMARY KEY (`MOVI_ID`),
 * INDEX `PROC_ID_idx` (`MOVI_PROC_ID` ASC) VISIBLE,
 * INDEX `MOVI_FUNC_ID_idx` (`MOVI_FUNC_ID` ASC) VISIBLE,
 * CONSTRAINT `MOVI_PROC_ID`
 * FOREIGN KEY (`MOVI_PROC_ID`)
 * REFERENCES `gerenciamentomateriaprima`.`TIPO_MOVIMENTACAO` (`TIMO_ID`),
 * CONSTRAINT `MOVI_FUNC_ID`
 * FOREIGN KEY (`MOVI_FUNC_ID`)
 * REFERENCES `gerenciamentomateriaprima`.`FUNCIONARIO` (`FUNC_ID`)
 * )
 * ;";
 * $conn->exec($sql);
 * echo "Tabela MOVIMENTACAO criado<br>";
 *
 * //SQL para criar a tabela TIPO_MATERIA_PRIMA
 * $sql = "CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`TIPO_MATERIA_PRIMA` (
 * `TIMP_ID` INT NOT NULL,
 * `TIMP_NOME` VARCHAR(45) NULL,
 * `TIMP_DESCRICAO` VARCHAR(250) NULL,
 * PRIMARY KEY (`TIMP_ID`))
 * ;";
 * $conn->exec($sql);
 * echo "Tabela TIPO_MATERIA_PRIMA criado<br>";
 *
 * //SQL para criar a tabela MATERIA_PRIMA
 * $sql = "CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`MATERIA_PRIMA` (
 * `MATE_ID` INT NOT NULL,
 * `MATE_DATA` DATE NULL,
 * `MATE_PESO` DOUBLE NULL,
 * `MATE_DESCRICAO` VARCHAR(100) NULL,
 * `MATE_TPMP_ID` INT NULL,
 * PRIMARY KEY (`MATE_ID`),
 * INDEX `MATE_TPMP_ID_idx` (`MATE_TPMP_ID` ASC) VISIBLE,
 * CONSTRAINT `MATE_TPMP_ID`
 * FOREIGN KEY (`MATE_TPMP_ID`)
 * REFERENCES `gerenciamentomateriaprima`.`TIPO_MATERIA_PRIMA` (`TIMP_ID`)
 * ON DELETE NO ACTION
 * ON UPDATE NO ACTION)
 * ;";
 * $conn->exec($sql);
 * echo "Tabela MATERIA_PRIMA criado<br>";
 *
 * /*
 * //SQL para criar a tabela TIPO_MOVIMENTACAO
 * $sql = "";
 * $conn->exec($sql);
 * echo "Tabela XPT criado";
 *
 *
 * // Fechando a conexão com o banco de dados
 * $conn = null;
 * } catch(PDOException $e) {
 * echo "Erro ao criar tabelas: " . $e->getMessage();
 * }
 *
 */
?>