<?php 

include_once(__DIR__ . "/classes/newUser.php");

session_start();

$newUser = new NewUser();
$newUser->setEmail($_SESSION["user"]);

$data = $newUser->FindData();

$_SESSION["id"] = $data["id"];

if($data["new"] == true){
   header("Location: profielVervolledigen.php");
};


include_once(__DIR__ . "/classes/search.php");

$dataSearch = null;

if (!empty($_POST['search'])){
        try {
            $search = new Search();
            $search -> setSearch($_POST['search']);
            $dataSearch = $search -> fetchData();
        } catch (\Throwable $th) {
            $error = $th -> getMessage();
        }
}

include_once(__DIR__."/buddyMatch.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/navigatie.css" />
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style>
</head>

<body>

    <?php include_once(__DIR__ . "/inc.hamburger.php"); ?>

    <?php include_once("inc.nav.php"); ?>

    <h1>Hallo<?php  ?></h1>

    <div>
        <h2>Zoek hier naar buddy's ! Zoeken kan op naam of interesses.</h2>
        <form action="index.php" method="POST">
            <input type="text" name="search" placeholder="Zoeken...">
            <button type="submit" name="submit-search">Zoeken</button>
        </form>
    </div>

    <?php 

if( $dataSearch != null) {
    foreach($dataSearch as $result){ ?>
    <div>
        <img src="avatars/<?php echo $result["avatar"] ?>" alt="avatar">
        <h3><?php echo htmlspecialchars($result['firstname'] . " " . $result['lastname'])?></h3>
        <h4><?php echo htmlspecialchars($result['year']) ?></h4>

    </div>
    <?php }
} ?>

    <div>
        <h2>Wij hebben x student(en) gevonden met gelijke interesses!</h2>
        
        <?php 
        

        foreach($commonInterests as $common){
            $buddy = new BuddyMatch();
            $buddy->setMatch($common["id"]);
            $matchData = $buddy->FetchMatch();
        ?>

        <!-- Met de class buddyProposals kan je de css van de voorgestelde buddies veranderen --> 

        <div class="buddyProposals">
        
        <img src="avatars/<?php echo $matchData["avatar"] ?>" alt="avatar">
        <h3><?php echo htmlspecialchars($matchData["firstname"]) ?></h3>
        <h4><?php echo htmlspecialchars($matchData["year"]) ?></h4>
        <p>Gelijke interesses:</p>

        <?php foreach($matchData as $key1 => $match){
            foreach($userData as $key2 => $user){
               
                $interest = true;

            switch($key2){
               case "firstname":
               $interest = false;
               break;
     
               case "lastname":
               $interest = false;
               break;
     
               case "description":
               $interest = false;
               break;
     
               case "year":
               $interest = false;
               break;
     
               case "avatar":
               $interest = false;
               break;
     
               case "new":
               $interest = false;
               break;
     
               case "buddy":
               $interest = false;
               break;
          }

            if($interest == true){
                
              if($key1 == $key2 && $match == $user){ ?>
                
                <p><?php echo htmlspecialchars($key1 . " = " . $match) ?></p>

            <?php }
                  
    
            }
            }
        } 
        ?>
        
                
            
             
             
            
        </div>
        <?php }  ?> 
    </div>

    <script src="nav.js"></script>

</body>

</html>