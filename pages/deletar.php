<?php
include_once '../classes/Games.php';
if(isset($_GET['deletar'])){
    Games::deleteGame($_GET['deletar']);
}