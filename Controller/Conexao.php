<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexao
 *
 * @author Wandr
 */
class Conexao implements InterfaceConexao
{

    private $pdo;

    public function con()
    {
        try {

            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8; SET CHARACTER SET UTF8; 
                                                SET character_set_connection=UTF8; 
                                                SET character_set_client=UTF8;',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY
            );

            $db = "fitcard";
            $user = "root";
            $senha = "";
            $host = "localhost";

            $this->pdo = new PDO("mysql:host=$host;dbname=$db", "$user", "$senha", $options);

            return $this->pdo;
        } catch (PDOException $e) {
            exit("Erro: " . $e->getMessage());
        }
    }
}
