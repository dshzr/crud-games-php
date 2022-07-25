<?php

include_once 'Games.php';

$allGames = Games::getGames();

echo json_encode($allGames);