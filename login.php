<?php
include_once(__DIR__ . "/classes/loginVerification.php");

$passwordMatch = true;

if(!empty($_POST)){
    try {
        $verification = new Verification();
        $verification->setEmail($_POST["email"]);
        $verification->setPassword($_POST["password"]);

        $passwordVerification = $verification->fetchPassword();

        if(password_verify($_POST["password"], $passwordVerification)){
            $passwordMatch = true;
        }
        else{
            throw new Exception("Paswoord of emailadres is fout");
            $passwordMatch = false;
        }

        if($passwordMatch == true){
            session_start();

            header("Location: index.php");
        }


    }

    catch (\Throwable $th){
        $error = $th->getMessage();
    }

    

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

<?php if(isset($error)):?>
<div class="error" style="color: red;"><?php echo $error;?></div>
<?php endif;?>

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