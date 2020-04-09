<?php

include_once(__DIR__ . "/classes/Match.php");

$buddy = new BuddyMatch();
$buddy->setUser($_SESSION['id']);

$userData = $buddy->FetchUser();

switch($userData["buddy"]){
    case "buddy":
        $buddy->setGoal($userData["buddy"]);
    break;

    case "begeleider":
        $buddy->setGoal($userData["buddy"]);
    break;
}

$buddyData = $buddy->FetchBuddies();




?>
