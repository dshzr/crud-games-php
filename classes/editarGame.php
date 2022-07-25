<?php

include_once 'Games.php';

if(isset($_POST)){
    $nome = $_POST['nome-game'];
    $descricao = $_POST['descricao-game'];
    $valor = doubleval($_POST['valor-game']);
    $id = intVal($_POST['id-game']);
    
    $game = [
        "id" => $id,
        "nome" => $nome,
        "descricao" => $descricao,
        "valor" =>  $valor,
        "id" => $id
    ];
    
    Games::updateGame($game);
}
