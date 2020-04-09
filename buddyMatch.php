<?php

include_once(__DIR__ . "/classes/Match.php");

$buddy = new BuddyMatch();
$buddy->setUser($_SESSION['id']);

$userData = $buddy->FetchUser();

switch($userData["buddy"]){
    case "buddy":
        echo "buddy";
    break;

    case "begeleider":
        echo "begeleider";
    break;
}

?>
