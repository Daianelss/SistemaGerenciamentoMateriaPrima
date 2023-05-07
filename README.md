# Projeto Integradrador / Grupo 27 - SENAC SP (Segunda Entrega - Primeiro Semestre).
<p><i> Integrantes do grupo 27:</i><br><br>
1. Ana Luíza Costa Lima<br>
2. Anderson Pedro de Alcântara<br>
3. Daiane Lucena Silva<br>
4. Laís Pereira dos Santos Araújo<br>
5. Lucas da Silva Freire<br>
6. Marcela de Jesus Santos<br>
7. Natã de Souza Cooper</P><br>

## Gerênciamento de Matéria Prima.
<p> Este é um projeto que engloba um sistema com a função de gerir, toda a matéria prima utilizada por uma empresa familiar de pequeno porte. </p>

  
## Instalação do aplicativo!
<p>Para instalar o sistema, você precisará dos seguintes recusrsos:</p>
* [XAMPP](https://www.apachefriends.org/pt_br/index.html)<br>
* [MySQL Workbanch](https://dev.mysql.com/downloads/workbench/)<br>
* [Visual Studio Code](https://code.visualstudio.com/)<br>
* [Git](https://git-scm.com/)<br>
* [GitHub](https://github.com/) Ter uma conta na plataforma GitHub!<br><br>

**NOTA:** Precisará de *usuário e senha* para usar o Workbanch.<br><br>

<p>Após instalar os programas acima, e ter uma conta no GitHub, siga os seguintes passos para clonar o repositório git:</p><br>
* Abra o terminal do git, clique em git bash, na tela seguinte digite:<br>
```<br>
* $ cd C:/xampp/htdocs<br>
* git clone https://github.com/Daianelss/SistemaGerenciamentoMateriaPrima.git<br>
* $ cd SistemaGerenciamentoMateriaPrima<br>
* $ find -maxdepht 1 -mindepth 1 -exec mv -t .. {} +<br>
* $ cd ..<br>
* $ git pull origin main<br>
```
<p>Agora você já estará com o repositório em sua máquina e atualizado.<br>
Então digite:<br></p>
```<br>
C:\xampp\htdocs\src\config<br>
```<br>
Renomeie o arquivo '_Conexao.php' para 'conexao.php'<br>

Abra o arquivo e preencha com as configurações do seu servidor mysql

faça o mesmo procedimento para o arquivo 

```
_db.php
```

abra o seu gerenciador de banco de dados

e crie utilizando os seguintes comandos:

```
-- SQL para criar o banco de dados
CREATE DATABASE IF NOT EXISTS `gerenciamentomateriaprima`;

-- Define o banco de dados a ser utilizado
USE `gerenciamentomateriaprima`;

-- SQL para criar a tabela FUNCIONARIO
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`FUNCIONARIO` (
  `FUNC_ID` INT NOT NULL AUTO_INCREMENT,
  `FUNC_NOME` VARCHAR(45) NULL,
  PRIMARY KEY (`FUNC_ID`)
);

-- SQL para criar a tabela TIPO_MOVIMENTACAO
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`TIPO_MOVIMENTACAO` (
  `TIMO_ID` INT NOT NULL AUTO_INCREMENT,
  `TIMO_NOME` VARCHAR(45) NULL,
  PRIMARY KEY (`TIMO_ID`)
);

-- SQL para criar a tabela MOVIMENTACAO
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`MOVIMENTACAO` (
  `MOVI_ID` INT NOT NULL AUTO_INCREMENT,
  `MOVI_DATE` DATE NOT NULL,
  `MOVI_PESO` DOUBLE NULL,
  `MOVI_DESC` VARCHAR(300) NULL,
  `MOVI_PESOSAIDA` DOUBLE NULL,
  `MOVI_PROC_ID` INT NULL,
  `MOVI_FUNC_ID` INT NULL,
  PRIMARY KEY (`MOVI_ID`),
  INDEX `PROC_ID_idx` (`MOVI_PROC_ID` ASC) VISIBLE,
  INDEX `MOVI_FUNC_ID_idx` (`MOVI_FUNC_ID` ASC) VISIBLE,
  CONSTRAINT `MOVI_PROC_ID`
    FOREIGN KEY (`MOVI_PROC_ID`)
    REFERENCES `gerenciamentomateriaprima`.`TIPO_MOVIMENTACAO` (`TIMO_ID`),
  CONSTRAINT `MOVI_FUNC_ID`
    FOREIGN KEY (`MOVI_FUNC_ID`)
    REFERENCES `gerenciamentomateriaprima`.`FUNCIONARIO` (`FUNC_ID`)
);

-- SQL para criar a tabela TIPO_MATERIA_PRIMA
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`TIPO_MATERIA_PRIMA` (
  `TIMP_ID` INT NOT NULL AUTO_INCREMENT,
  `TIMP_NOME` VARCHAR(45) NULL,
  `TIMP_DESCRICAO` VARCHAR(250) NULL,
  PRIMARY KEY (`TIMP_ID`)
);

-- SQL para criar a tabela MATERIA_PRIMA
CREATE TABLE IF NOT EXISTS `gerenciamentomateriaprima`.`MATERIA_PRIMA` (
  `MATE_ID` INT NOT NULL AUTO_INCREMENT,
  `MATE_DATA` DATE NULL,
  `MATE_PESO` DOUBLE NULL,
  `MATE_DESCRICAO` VARCHAR(100) NULL,
  `MATE_TPMP_ID` INT NULL,
  PRIMARY KEY (`MATE_ID`),
  INDEX `MATE_TPMP_ID_idx` (`MATE_TPMP_ID` ASC) VISIBLE,
  CONSTRAINT `MATE_TPMP_ID`
    FOREIGN KEY (`MATE_TPMP_ID`)
    REFERENCES `gerenciamentomateriaprima`.`TIPO_MATERIA_PRIMA` (`TIMP_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
```
