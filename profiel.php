<?php

include_once(__DIR__ . "/classes/userProfile.php");

session_start();

$userPro = new UserProfile;
$userPro->setUser($_SESSION["user"]);

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


if(!empty($_POST)){
    include_once(__DIR__ . "/classes/logicProfile.php");  
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

<?php include_once(__DIR__ . "/inc.nav.php"); ?>

    <h1>Profiel</h1>

    <section>
    
    <form id="form" action="" method="post" enctype="multipart/form-data">
    
    <?php if(isset($error)):?>
    <div class="error" style="color: red;"><?php echo $error;?></div>
    <?php endif;?>

    <div id="oldAvatar">
    <img src="avatars/<?php echo $data["avatar"] ?>" alt="avatar">
    </div>

    <div>
    <label for="avatar" style="cursor: pointer;">Klik hier om je avatar te veranderen</label>
    <input type="file"  accept="image/*" name="avatar" id="avatar"  onchange="loadFile(event)" style="display: none;">
    <img id="output" width="200" />
    </div>

    <div>
    <p>Voornaam: <?php echo $data["firstname"] ?></p>
    <label for="firstname">Verander voornaam</label>
    <input type="text" id="firstname" name="firstname">
    </div>

    <div>
    <p>Familienaam: <?php echo $data["lastname"] ?></p>
    <label for="lastname">Verander familienaam</label>
    <input type="text" id="lastname" name="lastname">
    </div>

    <div>
    <p>Email: <?php echo $data["email"] ?></p>
    </div>

    <div>
    <p>Verander email</p>
    </div>

    <div>
    <label for="emailVerification">Wachtwoord</label>
    <input type="password" id="emailVerification" name="emailVerification">
    </div>

    <div>
    <label for="email">Nieuw emailadres</label>
    <input type="text" id="email" name="email">
    </div>

    <div>
    <p>Verander wachtwoord</p>
    </div>

    <div>
    <label for="passwordVerification">Oud wachtwoord</label>
    <input type="password" id="passwordVerification" name="passwordVerification">
    </div>

    <div>
    <label for="password">Nieuw wachtwoord</label>
	<input type="password" id="password" name="password">
    </div>

    <div>
    <label for="passwordConfirmation">Bevestig je nieuwe wachtwoord</label>
	<input type="password" id="passwordConfirmation" name="passwordConfirmation">
    </div>



    <div>
    <p>Profieltekst: <?php echo $data["description"] ?></p>
    <label for="description">Verander profieltekst</label>
    <input type="text" id="description" name="description">
    </div>

    <div>
    <p>Provincie: <?php echo $data["province"] ?></p>
    <label for="province">Verander provincie</label>
    <input type="text" id="province" name="province" placeholder="bv. Vlaams-Brabant">
    </div>

    <div>
    <p>Gemeente/stad: <?php echo $data["town"] ?></p>
    <label for="town">Verander gemeente/stad</label>
    <input type="text" id="town" name="town" placeholder="bv. Mechelen">
    </div>

    <div>
    <p>Jaar: <?php echo $data["year"] ?></p>
    <label for="year">Verander jaar</label>
    <select name="year" id="year">
    <option id="select1" value="" selected="selected" disabled>Jaar</option>
        <option value="1IMD">1 IMD 👶</option>
        <option value="2IMD">2 IMD 👩👨</option>
        <option value="3IMD">3 IMD 🧓👴</option>
    </select>
    </div>

    <div>
    <p>Passie: <?php echo $data["passion"] ?></p>
    <label for="passion">Verander passie</label>
    <select name="passion" id="passion">
    <option id="select2" value="" selected="selected" disabled>Passie</option>
        <option value="Design">Design 🖌</option>
        <option value="Development">Development 💻</option>
        <option value="Design&Development">Design&Development 🖌💻</option>
    </select>
    </div>

    <div>
    <p>OS: <?php echo $data["os"] ?></p>
    <label for="os">Verander OS</label>
    <select name="os" id="os">
    <option id="select3" value="" selected="selected" disabled>OS</option>
        <option value="Windows">Windows</option>
        <option value="Mac">Mac</option>
        <option value="Linux">Linux</option>
    </select>
    </div>

    <div>
    <p>Favoriet film genre: <?php echo $data["movie"] ?></p>
    <label for="movie">Verander favoriet film genre</label>
    <select name="movie" id="movie">
    <option id="select4" value="" selected="selected" disabled>Film genre</option>
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
    <select name="game" id="game">
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
    <select name="music" id="music">
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
    <select name="sport" id="sport">
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
	<input type="submit" id="submit" value="Bevestig veranderingen">	
    </div>
    
    </form>
    
    </section>
    <script src="profiel.js"></script>
    <script src="avatarUpdate.js"></script>
</body>
</html>