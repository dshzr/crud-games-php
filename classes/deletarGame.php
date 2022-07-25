<?php

include_once 'Games.php';

if(isset($_GET['id'])){
    $id = intVal($_GET['id']);
    Games::deleteGame($id);
}
