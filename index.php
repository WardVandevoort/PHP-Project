<?php 

include_once(__DIR__ . "/classes/newUser.php");

session_start();



$newUser = new NewUser();
$newUser->setEmail($_SESSION["user"]);

$data = $newUser->FindData();

if($data == true){
    header("Location: profielVervolledigen.php");
}











?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include_once("inc.nav.php"); ?>

<h1>Dit is de homepage</h1>

</body>
</html>