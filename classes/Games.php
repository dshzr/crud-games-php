<?php
include_once 'Conexao.php';




class Games{
    public $nome;
    public $descricao;
    public $valor;

     function __construct($nome, $descricao, $valor){
        if(strlen($nome)>0 and strlen($descricao)>0 and strlen($valor)>0){
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->valor = $valor;
        }
    }


    public function createGame(Games $game){
        $con = Conexao::conectar();
        try{
            $sql  = $con->prepare("INSERT INTO games VALUES(null,?,?,?)");
            $sql->execute(array($this->nome, $this->descricao, $this->valor));
            header('Location: /crud/pages/index.php');
        }catch(err){
            echo err.getMessage();
        }
        
    }
    
    static public function getGames(){
        
        $con = Conexao::conectar();
        try{
            $sql = $con->prepare("SELECT * FROM games");
            $sql->execute();
            $a = $sql->fetchAll();
            return $a;
        }catch(err){
            echo err->getMessage();
        }
        
    }

    public function updateGame($id){

    }

    public function deleteGame($id){

    }


}