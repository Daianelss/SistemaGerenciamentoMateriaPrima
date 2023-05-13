# PIGerenciamentoMateriaPrima
Esse é um projeto que engloba um pequeno sistema para gerenciamento de matéria prima de uma empresa de pequeno porte


#<h1>Configuração para abrir o sistema</h1>

<h2>Requisitos</h2>

- Xampp = Para o PHP
- Mysql Workbanch, ou PHPMyadmin. = Para o banco de dados.

*******************

<h4>NOTA: Caso use o PHPmyadmin, pode haver alguma divergencia ou algum passo diferente, caso não funcione o processo, tente procurar algo equivalente</h4>

*******************

Se você tiver o Workbanch instalado, precisara do usuario e senha utilizados.

*****************************

<h4>NÃO TEM COM RECUPERAR A SENHA</h4>

***************************** 

se esqueceu. Terá que desinstalar, e instalar novamente.

Caso tenha instalado o Xampp completo, ele já vem com o PHPmyadmin.
Não sei qual a configuração do PHPmyadmin, Acredito que ele vem com o Usuario ROOT, e senha vazia por padrão. então será necessário testar.

Após a instalação dos programas.
Você irá clonar o repositorio git,
utilizando os seguintes passos

<h3>Abra o terminal do git em qualquer lugar.</h3>

***********************

<h4>NOTA: Esse comando só funciona caso tenha feito a instalação padrão do XAMPP</h4>

***********************

<h3>Entra na pasta do Xampp.</h3>

```
$ cd C:/xampp/htdocs
```

<h3>Clona o repositorio, ou seja, realiza o dowload dos arquivos.</h3>

```
$  git clone https://github.com/Daianelss/SistemaGerenciamentoMateriaPrima.git
```

<h3>Entra na pasta criada</h3>

```
$ cd SistemaGerenciamentoMateriaPrima
```

<h3>Move todos os arquivos de dentro da pasta, para fora.</h3>

```
$ find -maxdepth 1 -mindepth 1 -exec mv -t .. {} +
```

<h3>Volta para a pasta anterior</h3>

```
$ cd ..
```

<h3>Apaga a pasta desnecessária</h3>

```
$ rm -r PIGerenciamentoMateriaPrima/
```

Caso já tenha clonado, apenas atualize o repositorio utilizando

```
$ git pull origin main
```

Após está com o repositorio baixado, e atualizado.

Entre no seguinte caminho

```
C:\xampp\htdocs\src\config
```

renomeie o arquivo 

```
_Conexao.php
```

para 

```
Conexao.php
```

Abra o arquivo e preencha com as configurações do seu servidor mysql

faça o mesmo procedimento para o arquivo 

```
_db.php
```

abra o seu gerenciador de banco de dados

e crie utilizando os seguintes comandos:

DROP DATABASE `gerenciamentomateriaprima`;

-- SQL para criar o banco de dados
CREATE DATABASE IF NOT EXISTS `gerenciamentomateriaprima`;

-- Define o banco de dados a ser utilizado
USE `gerenciamentomateriaprima`;

-- SQL para criar a tabela FUNCIONARIO
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`FUNCIONARIO` (
  `FUNC_ID` INT NOT NULL AUTO_INCREMENT,
  `FUNC_NOME` VARCHAR(45) NULL,
  `FUNC_STATUS` INT,

  PRIMARY KEY (`FUNC_ID`)
);

-- SQL para criar a tabela PROCESSO
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`TIPO_PROCESSO` (
  `TIPR_ID` INT NOT NULL AUTO_INCREMENT,
  `TIPR_NOME` VARCHAR(45) NULL,
  `TIPR_STATUS` INT,
  PRIMARY KEY (`TIPR_ID`)
);

-- SQL para criar a tabela MOVIMENTO
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`MOVIMENTO` (
  `MOVI_ID` INT NOT NULL AUTO_INCREMENT,
  `MOVI_DATE` DATE NOT NULL,
  `MOVI_PESO` DOUBLE NULL,
  `MOVI_DESC` VARCHAR(300) NULL,
  `MOVI_TIPO` DOUBLE NULL,
  `MOVI_TIPR_ID` INT NULL,
  `MOVI_FUNC_ID` INT NULL,
  PRIMARY KEY (`MOVI_ID`),
  INDEX `TIPR_ID_idx` (`MOVI_TIPR_ID` ASC) VISIBLE,
  INDEX `MOVI_FUNC_ID_idx` (`MOVI_FUNC_ID` ASC) VISIBLE,
  CONSTRAINT `MOVI_TIPR_ID`
    FOREIGN KEY (`MOVI_TIPR_ID`)
    REFERENCES `gerenciamentomateriaprima`.`TIPO_PROCESSO` (`TIPR_ID`),
  CONSTRAINT `MOVI_FUNC_ID`
    FOREIGN KEY (`MOVI_FUNC_ID`)
    REFERENCES `gerenciamentomateriaprima`.`FUNCIONARIO` (`FUNC_ID`)
);

-- SQL para criar a tabela TIPO_MATERIA_PRIMA
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`TIPO_MATERIA_PRIMA` (
  `TIMP_ID` INT NOT NULL AUTO_INCREMENT,
  `TIMP_NOME` VARCHAR(45) NULL,
  `TIMP_DESCRICAO` VARCHAR(250) NULL,
  `TIMP_STATUS` INT,
  PRIMARY KEY (`TIMP_ID`)
);

-- SQL para criar a tabela MATERIA_PRIMA
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`MATERIA_PRIMA` (
  `MATE_ID` INT NOT NULL AUTO_INCREMENT,
  `MATE_DATA` DATE NULL,
  `MATE_PESO` DOUBLE NULL,
  `MATE_DESCRICAO` VARCHAR(100) NULL,
  `MATE_ENTRADA_SAIDA` INT NOT NULL,
  `MATE_TPMP_ID` INT NULL,
  PRIMARY KEY (`MATE_ID`),
  INDEX `MATE_TPMP_ID_idx` (`MATE_TPMP_ID` ASC) VISIBLE,
  CONSTRAINT `MATE_TPMP_ID`
    FOREIGN KEY (`MATE_TPMP_ID`)
    REFERENCES `gerenciamentomateriaprima`.`TIPO_MATERIA_PRIMA` (`TIMP_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

