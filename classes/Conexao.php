<?php
header('Access-Control-Allow-Origin: *');

class Conexao{

    static public function conectar(){
        $host = 'localhost:3306';
        $db   = 'db_games';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8mb4';
        
        $host_info = "mysql:host=$host;dbname=$db";
       
        try {
             $con = new PDO($host_info, $user, $pass);
             return $con;
        } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

}


Conexao::conectar();