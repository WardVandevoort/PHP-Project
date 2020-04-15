<?php

include_once(__DIR__ . "/classes/buddyProfile.php");

session_start();

$buddyPro = new BuddyProfile();
$buddyPro->setUser($_GET["buddyId"]);

$data = $buddyPro->fetchBuddy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/profiel.css" />
    <link rel="stylesheet" type="text/css" href="css/navigatie.css" />
    <title>Profiel van <?php echo htmlspecialchars($data["firstname"]); ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style>
</head>

<body>

    <?php include_once(__DIR__ . "/inc.hamburger.php"); ?>
    <?php include_once(__DIR__ . "/inc.nav.php"); ?>
    <h1>Profiel</h1>

    <section class="flex">
        <div id="nameImg">
            <div id="oldAvatar">
                <img src="avatars/<?php echo $data["avatar"] ?>" alt="avatar">
            </div>

            <h1><?php echo htmlspecialchars($data["firstname"]." ".$data["lastname"]) ?></h1>
        </div>
        <?php if(isset($error)):?>
            <div class="error" style="color: red;"><?php echo $error;?></div>
        <?php endif;?>

        <div id="profieltekstStyle">
            <p><?php echo htmlspecialchars($data["description"]) ?></p>
        </div>

        <table id="buddyProfile">

            <tr>
                <td>Woont in:</td>
                <td><?php echo htmlspecialchars($data["province"].", ".$data["town"]) ?></td>
            </tr>
            <tr>
                <td>Jaar:</td>
                <td><?php echo $data["year"] ?></td>
            </tr>
            <tr>
                <td>Passie:</td>
                <td><?php echo $data["passion"] ?></td>
            </tr>
            <tr>
                <td>Os:</td>
                <td><?php echo $data["os"] ?></td>
            </tr>
            <tr>
                <td>Favoriet film genre:</td>
                <td><?php echo $data["movie"] ?></td>
            </tr>
            <tr>
                <td>Favoriet gaming platform:</td>
                <td><?php echo $data["game"] ?></td>
            </tr>
            <tr>
                <td>Favoriet game genre:</td>
                <td><?php echo $data["gamegenre"] ?></td>
            </tr>
            <tr>
                <td>Favoriet muziek genre:</td>
                <td><?php echo $data["music"] ?></td>
            </tr>
            <tr>
                <td>Favoriete sport:</td>
                <td><?php echo $data["sport"] ?></td>
            </tr>
            <tr>
                <td>Rol:</td>
                <td><?php echo $data["buddy"] ?></td>
            </tr>


        
        </table>

    </section>
    <script src="profiel.js"></script>
    <script src="nav.js"></script>
    <script src="avatarUpdate.js"></script>




</body>

</html>