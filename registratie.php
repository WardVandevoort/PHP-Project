<?php

include_once(__DIR__ . "/classes/userRegistration.php");

if(!empty($_POST)){
    try {
        $user = new User();
        $user->setFirstName($_POST["firstName"]);
        
        $user->save();
    } catch (\Throwable $th) {
        //throw $th;
    }
};


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<section>

<form action="" method="post">

<h2>Maak een nieuw account</h2>

<div class="error">
    <p>hier komt een error boodschap</p>
</div>

<div>
    <label for="firstName">Voornaam</label>
    <input type="text" id="firstName" name="firstName">
</div>

<div>
    <label for="lastName">Familienaam</label>
    <input type="text" id="lastName" name="lastName">
</div>

<div>
    <label for="email">Email</label>
    <input type="text" id="email" name="email">
</div>

<div>
    <label for="password">Paswoord</label>
    <input type="password" id="password" name="password">
</div>

<div>
    <label for="passwordConfirmation">Bevestig je paswoord</label>
	<input type="password" id="passwordConfirmation" name="passwordConfirmation">
</div>

<div>
    <label for="year">Jaar</label>
    <select name="year" id="year">
        <option value="1imd" selected="selected">1 IMD 👶</option>
        <option value="2imd">2 IMD 👩👨</option>
        <option value="3imd">3 IMD 🧓👴</option>
    </select>
</div>

<div>
    <label for="passion">Passie</label>
    <select name="passion" id="passion">
        <option value="design" selected="selected">Design 🖌</option>
        <option value="development">Development 💻</option>
        <option value="both">Design&Development 🖌💻</option>
    </select>
</div>

<div>
    <label for="hobby">Hobby</label>
    <select name="hobby" id="hobby">
        <option value="game" selected="selected">Gamen 🎮</option>
        <option value="movies">Films/series kijken 📺</option>
        <option value="sport">Sporten 💪</option>
        <!--mogelijkheid om extra opties toe te voegen-->
    </select>
</div>

<div>
	<input type="submit" value="Maak account">	
</div>

</form>

</section>

</body>
</html>