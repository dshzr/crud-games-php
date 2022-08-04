<?php
include_once 'Conexao.php';

session_start();

//CRIAR/EDITAR GAME 
if(isset($_POST['submit'])){
    if($_POST['submit'] == 'cadastrar'){
        $erros = array();

        //validacao
        $nomeFilter = filter_input(INPUT_POST, 'nome');
        $descricaoFilter = filter_input(INPUT_POST, 'descricao');
        $valorFilter = filter_input(INPUT_POST, 'valor');

        

        if(!$nomeFilter){
           $erros[] = "preencha o nome do jogo";
        }
        if(!$descricaoFilter){
           $erros[] = "preencha a descricao do jogo";
        }
        if(!$valorFilter){
            $erros[] = "preencha o valor do jogo";
         }
        

        if(empty($erros)){
            unset($_SESSION['erros']);
            unset($_SESSION['valores']);
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $valor = doubleval($_POST['valor']);
            $game = new Games($nome, $descricao, $valor);
            $game->createGame($game);

        }else{
            $_SESSION['valores'] = array(
                "nome" => $nomeFilter,
                "descricao" => $descricaoFilter,
                "valor" => $valorFilter
            );
            $_SESSION['erros'] = $erros;
            header('Location: /crud/pages/cadastrar.php');
        }

    }
    else if(($_POST['submit'] == 'editar')){
        $erros = array();

        //validacao
        $nomeFilter = filter_input(INPUT_POST, 'nome-game');
        $descricaoFilter = filter_input(INPUT_POST, 'descricao-game');
        $valorFilter = filter_input(INPUT_POST, 'valor-game');
        $idFilter = filter_input(INPUT_POST, 'id-game');

        if(!$nomeFilter){
           $erros[] = "preencha o nome do jogo";
        }
        if(!$descricaoFilter){
           $erros[] = "preencha a descricao do jogo";
        }
        if(!$valorFilter){
            $erros[] = "preencha o valor do jogo";
         }

        //validacao
        if(empty($erros)){
            unset($_SESSION['erros']);
            unset($_SESSION['id-game']);
            $game = [
                "id" => $idFilter,
                "nome" => $nomeFilter,
                "descricao" => $descricaoFilter,
                "valor" =>  $valorFilter,
                "id" => $idFilter
            ];
          
            Games::updateGame($game);
        }else{
            $_SESSION['id-game'] = $idFilter;
            $_SESSION['erros'] = $erros;
            header('Location: /crud/pages/editar.php');
        }
    }
 
}





//CRUD DATABASE
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
            echo err->getMessage();
        }
        
    }
    
    static public function getGames(){
        
        $con = Conexao::conectar();
        try{
            $sql = $con->prepare("SELECT * FROM games");
            $sql->execute();
            $allGames = $sql->fetchAll();
            return $allGames;
        }catch(err){
            echo err->getMessage();
        }
        
    }

    static public function updateGame($game){
        $con = Conexao::conectar();
        try{
            $sql  = $con->prepare("UPDATE games SET nome = ?, descricao = ?, valor = ? WHERE id = ?");

            echo $game['id'];
            $sql->execute(array($game['nome'],$game['descricao'], $game['valor'], $game['id'] ));
        
           
            header('Location: /crud/pages/index.php');
        }catch(err){
            echo err->getMessage();
        }
    }

    static public function deleteGame($id){
        $con = Conexao::conectar();
        try{
            $sql  = $con->prepare("DELETE FROM games WHERE id = $id");
            $sql->execute();
            header('Location: /crud/pages/index.php');
        }catch(err){
            echo err->getMessage();
        }
    }


}