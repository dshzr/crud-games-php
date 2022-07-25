<?php

include_once 'Games.php';

if(isset($_POST)){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $valor = doubleval($_POST['valor']);
    $game = new Games($nome, $descricao, $valor);
    $game->createGame($game);
}
