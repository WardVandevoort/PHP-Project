<?php

if(!empty($_POST)){
    $email = $_POST["email"];
    $password = $_POST["password"];
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
    
<section>

<form action="" method="post">

<h2>Meld je aan</h2>

<!--Error toevoegen-->

<div>
    <label for="email">Email</label>
    <input type="text" id="email" name="email">
</div>

<div>
    <label for="password">Paswoord</label>
    <input type="password" id="password" name="password">
</div>

<div>
	<input type="submit" value="Aanmelden">	
</div>

</form>

</section>

</body>
</html>