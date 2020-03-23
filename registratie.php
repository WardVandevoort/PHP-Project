<?php

include_once(__DIR__ . "/classes/userRegistration.php");

$emailVerification = true;
$required = "@student.thomasmore.be";
$requiredVerification = true;

if(!empty($_POST)){
    try {
        $user = new User();
        $user->setFirstName($_POST["firstName"]);
        $user->setLastName($_POST["lastName"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setPasswordConfirmation($_POST["passwordConfirmation"]);
        
        $emailAdressen = User::getEmails();

        foreach($emailAdressen as $emailAdres){
        if($_POST["email"] == $emailAdres["email"]){
            $emailVerification = false;
        }
        }

        if($emailVerification == false){
            throw new Exception("Dit emailadres is al in gebruik");
        }

        if(strpos($_POST["email"], $required) == false){
            throw new Exception("Dit is geen geldig studenten emailadres, een geldig studenten emailadres eindigt op @student.thomasmore.be");
            $requiredVerification = false;
        }


        if($emailVerification == true && $requiredVerification == true){
            $user->save();
        }
        
            
        
        
    } catch (\Throwable $th) {
        $error = $th->getMessage();
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

<?php if(isset($error)):?>
<div class="error" style="color: red;"><?php echo $error;?></div>
<?php endif;?>

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
	<input type="submit" value="Maak account">	
</div>

</form>

</section>

</body>
</html>