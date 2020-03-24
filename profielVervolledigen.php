<?php

/*if(!empty($_POST)){
    try {
        $avatar = $_POST["avatar"];
        echo $avatar;
    } catch (\Throwable $th) {
        //throw $th;
    }
}
*/
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

<h2>Vervolledig je profiel</h2>

<?php if(isset($error)):?>
<div class="error" style="color: red;"><?php echo $error;?></div>
<?php endif;?>

<div>
<label for="avatar" style="cursor: pointer;">Klik om een avatar te kiezen</label>
<input type="file"  accept="image/*" name="avatar" id="avatar"  onchange="loadFile(event)" style="display: none;">
<img id="output" width="200" />
</div>

<div>
    <label for="address">Adres</label>
    <input type="text" id="address" name="address" placeholder="Provincie, Gemeente, Postcode">
</div>

<div>
    <label for="year">Jaar</label>
    <select name="year" id="year">
        <option value="1IMD" selected="selected">1 IMD 👶</option>
        <option value="2IMD">2 IMD 👩👨</option>
        <option value="3IMD">3 IMD 🧓👴</option>
    </select>
</div>

<div>
    <label for="passion">Passie</label>
    <select name="passion" id="passion">
        <option value="Design" selected="selected">Design 🖌</option>
        <option value="Development">Development 💻</option>
        <option value="Design&Development">Design&Development 🖌💻</option>
    </select>
</div>

<div>
    <label for="os">OS</label>
    <select name="os" id="os">
        <option value="Windows" selected="selected">Windows</option>
        <option value="Mac">Mac</option>
        <option value="Linux">Linux</option>
    </select>
</div>

<div>
    <label for="movie">Favoriet film genre</label>
    <select name="movie" id="movie">
        <option value="Actie" selected="selected">Actie ⚔</option>
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
    <label for="game">Favoriet gaming platform</label>
    <select name="game" id="game">
        <option value="Playstation" selected="selected">Playstation 🎮</option>
        <option value="Xbox">Xbox 🎮</option>
        <option value="PC">PC 💻</option>
        <option value="Nintendo">Nintendo 🕹</option>
        <option value="Mobile">Mobile 📱</option>
        <option value="geen">Ik game niet 😭</option>
    </select>
</div>

<div>
    <label for="music">Favoriet muziek genre</label>
    <select name="music" id="music">
        <option value="Rock" selected="selected">Rock 🎸</option>
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
    <label for="sport">Favoriete sport</label>
    <select name="sport" id="sport">
        <option value="Fitness" selected="selected">Fitness 🏋️‍♂️</option>
        <option value="Voetbal">Voetbal ⚽</option>
        <option value="Basketbal">Basketbal 🏀</option>
        <option value="Volleybal">Volleybal 🏐</option>
        <option value="Gevechtssport">Gevechtssport 👊</option>
        <option value="Tennis">Tennis 🥎</option>
        <option value="Zwemmen">Zwemmen 🏊‍♂️</option>
    </select>
</div>

<div>
	<input type="submit" id="submit" value="Bevestig">	
</div>


</form>

</section>

<script src="profielVervolledigen.js"></script>

</body>
</html>