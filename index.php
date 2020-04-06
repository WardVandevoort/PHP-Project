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

?>

<script>
function showNav(){
    var hamburger = document.querySelector(".hamburger");
    var navLinks = document.querySelector("#menuLinks");
    hamburger.classList.toggle("is-active");
    if(navLinks.style.display === "block"){
        navLinks.style.display = "none";
    }else{
        navLinks.style.display = "block";
    }
}
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/hamburger.css"/>
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 
</head>
<body>

    <div id="nav-container">
        <img src="images/woordlogo.png" alt="logo">
        <!-- <a href='javascript:void();' onclick="showNav()" id="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </a> -->
        <button class="hamburger hamburger--spin" onclick="showNav()" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div> 

<?php include_once("inc.nav.php"); ?>

<h1>Dit is de homepage</h1>

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
    <?php include_once(__DIR__."/buddyMatch.php"); ?>
    <div>
        
    </div>
</div>

</body>
</html>