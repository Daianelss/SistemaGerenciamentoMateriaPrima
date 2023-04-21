<?php

class Conexao
{

    public static function conectar()
    {
        // Configuração de conexão com o banco de dados
        $servername = ""; // Nome do servidor (geralmente é "localhost" ou "127.0.0.1" se estiver rodando localmente)
        $username = ""; // Nome de usuário do banco de dados
        $password = ""; // Senha do banco de dados
        $dbname = "gerenciamentomateriaprima"; // Nome do banco de dados

        // Cria a conexão com o banco de dados
        return mysqli_connect($servername, $username, $password, $dbname);


        asdasd
    }
}