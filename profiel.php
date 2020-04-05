<?php

include_once(__DIR__ . "/classes/userProfile.php");

session_start();

$userPro = new UserProfile;
$userPro->setUser($_SESSION["id"]);

$data = $userPro->fetchData();

$emailVerification = true;
$required = "@student.thomasmore.be";
$requiredVerification = true;
$passwordVerification = true;
$passwordMatch1 = true;
$passwordMatch2 = true;
$imgSizeOk = false;
$descLengthOK = true;
$securePassword;
$newImg = false;


if(!empty($_POST)){
    include_once(__DIR__ . "/classes/logicProfile.php");  
}


?>

<script>
    function showNav(){
        var navLinks = document.querySelector("#menuLinks");
        if(navLinks.style.display === "block"){
            navLinks.style.display = "none";
        }else{
            navLinks.style.display = "block";
        }
    }
    function showPassChange(){
        var passChange = document.querySelector("#passChange");
        if(passChange.style.display === "block"){
            passChange.style.display = "none";
        }else{
            passChange.style.display = "block";
        }
    }
    function showEmailChange(){
        var emailChange = document.querySelector("#emailChange");
        if(emailChange.style.display === "block"){
            emailChange.style.display = "none";
        }else{
            emailChange.style.display = "block";
        }
    }

    // function showInput(){
    //     var inputField = document.getElementsByClassName("inputField");
    //     console.log(inputField);
    //     for(var i > 0 ; ii = inputField.length; i < ii ; i++){
    //         if(inputField.style.display === "block"){
    //             inputField.style.display = "none";
    //             console.log("block");
    //         }else{
    //             inputField.style.display = "block";
    //             console.log("none");
    //         }
    //     }
    // }

</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/profiel.css"/>
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Ubuntu:wght@500;700&display=swap');
    </style> 
</head>
<body>



    <div id="nav-container">
        <img src="images/woordlogo.png" alt="logo">
        <a href='javascript:void();' onclick="showNav()" id="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </a>
        
    </div>
    <?php include_once(__DIR__ . "/inc.nav.php"); ?>
    

    <h1>Profiel</h1>

    <section class="flex">
        <!-- <a href='javascript:void();' id="changeProfile" onclick="showInput()">Profiel aanpassen</a> -->

    
    <form id="form" action="" method="post" enctype="multipart/form-data">
    
        <?php if(isset($error)):?>
            <div class="error" style="color: red;"><?php echo $error;?></div>
        <?php endif;?>

        <div id="oldAvatar">
            <img src="avatars/<?php echo $data["avatar"] ?>" alt="avatar">
        </div>

        <div>
        <label for="avatar" id="changeAvatar" style="cursor: pointer;">Avatar veranderen</label>
            <input type="file"  accept="image/*" name="avatar" id="avatar"  onchange="loadFile(event)" style="display: none;">
            <img id="output" width="200" />
        </div>

        <div>
            <p>Voornaam: <?php echo htmlspecialchars($data["firstname"]) ?></p>
            <label for="firstname">Verander voornaam</label>
            <input class="inputField" type="text" id="firstname" name="firstname">
        </div>

        <div>
            <p>Familienaam: <?php echo htmlspecialchars($data["lastname"]) ?></p>
            <label for="lastname">Verander familienaam</label>
            <input class="inputField" type="text" id="lastname" name="lastname">
        </div>

        <div>
            <p>Email: <?php echo htmlspecialchars($data["email"]) ?></p>
        </div>

        <div>
            <a href='javascript:void();' id="changeEmail" onclick="showEmailChange()">Verander email</a>
        </div>

        <div id="emailChange">
            <label for="emailVerification">Wachtwoord</label>
            <input class="inputField" type="password" id="emailVerification" name="emailVerification">
        
            <label for="email">Nieuw emailadres</label>
            <input class="inputField" type="text" id="email" name="email">
        </div>

        <div>
        <a href='javascript:void();' id="changePass" onclick="showPassChange()" >Verander wachtwoord</a>
        </div>

        <div id="passChange">
            <label for="passwordVerification">Oud wachtwoord</label>
            <input class="inputField" type="password" id="passwordVerification" name="passwordVerification">
        
            <label for="password">Nieuw wachtwoord</label>
	        <input class="inputField" type="password" id="password" name="password">
        
            <label for="passwordConfirmation">Bevestig je nieuwe wachtwoord</label>
	        <input class="inputField" type="password" id="passwordConfirmation" name="passwordConfirmation">
        </div>



        <div>
            <p>Profieltekst: <?php echo htmlspecialchars($data["description"]) ?></p>
            <label for="description">Verander profieltekst</label>
            <input class="inputField" type="text" id="description" name="description">
        </div>

        <div>
            <p>Provincie: <?php echo htmlspecialchars($data["province"]) ?></p>
            <label for="province">Verander provincie</label>
            <input class="inputField" type="text" id="province" name="province" placeholder="bv. Vlaams-Brabant">
        </div>

        <div>
            <p>Gemeente/stad: <?php echo htmlspecialchars($data["town"]) ?></p>
            <label for="town">Verander gemeente/stad</label>
            <input class="inputField" type="text" id="town" name="town" placeholder="bv. Mechelen">
        </div>

        <div>
            <p>Jaar: <?php echo $data["year"] ?></p>
            <label for="year">Verander jaar</label>
            <select class="inputField" name="year" id="year">
                <option id="select1" value="" selected="selected" disabled>Jaar</option>
                <option value="1IMD">1 IMD 👶</option>
                <option value="2IMD">2 IMD 👩👨</option>
                <option value="3IMD">3 IMD 🧓👴</option>
            </select>
        </div>

        <div>
            <p>Passie: <?php echo $data["passion"] ?></p>
            <label for="passion">Verander passie</label>
            <select class="inputField" name="passion" id="passion">
                <option id="select2" value="" selected="selected" disabled>Passie</option>
                <option value="Design">Design 🖌</option>
                <option value="Development">Development 💻</option>
                <option value="Design&Development">Design&Development 🖌💻</option>
            </select>
        </div>

        <div>
            <p>OS: <?php echo $data["os"] ?></p>
            <label for="os">Verander OS</label>
            <select class="inputField" name="os" id="os">
                <option  id="select3" value="" selected="selected" disabled>OS</option>
                <option value="Windows">Windows</option>
                <option value="Mac">Mac</option>
                <option value="Linux">Linux</option>
            </select>
        </div>

        <div>
            <p>Favoriet film genre: <?php echo $data["movie"] ?></p>
            <label for="movie">Verander favoriet film genre</label>
            <select class="inputField" name="movie" id="movie">
                <option  id="select4" value="" selected="selected" disabled>Film genre</option>
                <option value="Actie">Actie ⚔</option>
                <option value="Avontuur">Avontuur 🗺</option>
                <option value="Komedie">Komedie 🤣</option>
                <option value="Drama">Drama 😧</option>
                <option value="Horror">Horror 🎃</option>
                <option value="Romantisch">Romantisch 💋</option>
                <option value="Sciencefiction">Sciencefiction 🚀</option>
                <option value="Thriller">Thriller 😱</option>
            </select>
        </div>

        <div>
        <p>Favoriet gaming platform: <?php echo $data["game"] ?></p>
            <label for="game">Verander favoriet gaming platform</label>
            <select class="inputField" name="game" id="game">
                <option id="select5" value="" selected="selected" disabled>Gaming platform</option>
                <option value="Playstation">Playstation 🎮</option>
                <option value="Xbox">Xbox 🎮</option>
                <option value="PC">PC 💻</option>
                <option value="Nintendo">Nintendo 🕹</option>
                <option value="Mobile">Mobile 📱</option>
                <option value="geen">Ik game niet 😭</option>
            </select>
        </div>

        <div>
        <p>Favoriet muziek genre: <?php echo $data["music"] ?></p>
            <label for="music">Verander favoriet muziek genre</label>
            <select class="inputField" name="music" id="music">
                <option id="select6" value="" selected="selected" disabled>Muziek genre</option>
                <option value="Rock">Rock 🎸</option>
                <option value="Klassiek">Klassiek 🎻</option>
                <option value="Schlager">Schlager 🍻</option>
                <option value="Jazz">Jazz 🎷</option>
                <option value="R&B">R&B 🎶</option>
                <option value="Pop">Pop 🎉</option>
                <option value="Electronic">Electronic 💻</option>
                <option value="Rap">Rap 🤯</option>
                <option value="Latin">Latin 🏝</option>
            </select>
        </div>

        <div>
            <p>Favoriete sport: <?php echo $data["sport"] ?></p>
            <label for="sport">Verander favoriete sport</label>
            <select class="inputField" name="sport" id="sport">
                <option id="select7" value="" selected="selected" disabled>Sport</option>
                <option value="Fitness">Fitness 🏋️‍♂️</option>
                <option value="Voetbal">Voetbal ⚽</option>
                <option value="Basketbal">Basketbal 🏀</option>
                <option value="Volleybal">Volleybal 🏐</option>
                <option value="Gevechtssport">Gevechtssport 👊</option>
                <option value="Tennis">Tennis 🥎</option>
                <option value="Zwemmen">Zwemmen 🏊‍♂️</option>
                <option value="geen">Ik sport niet 😭</option>
            </select>
        </div>
        
         <div>
            <p>Ik ben hier: <?php echo $data["sport"] ?></p>
            <label for="buddy">verander je doel</label>
            <select class="inputField" name="buddy" id="buddy">
                <option value="buddy" selected="selected">om een buddy te worden</option>
                <option value="begleider1">om een begleider van 1IMD te zijn </option>
                <option value="begleider2">om een begleider van 2IMD te zijn</option>
            </select>
        </div>
        
        <div>
	    <input type="submit" id="submitBtn" value="Bevestig veranderingen">	
        </div>
    
    </form>
    
    </section>
    <script src="profiel.js"></script>
    <script src="avatarUpdate.js"></script>
</body>
</html>