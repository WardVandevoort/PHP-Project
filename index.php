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

if (isset($_POST['search'])){

    $dataSearch = null;

    try {
        $search = new Search();
        $search -> setSearch($_POST['search']);
        $dataSearch = $search -> fetchData();
    } catch (\Throwable $th) {
        $error = $th -> getMessage();
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

<?php include_once("inc.nav.php"); ?>

<h1>Dit is de homepage</h1>
<form action="index.php" method="POST">
    <input type="text" name="search" placeholder="Zoeken...">
    <button type="submit" name="submit-search">Zoeken</button>
</form>

<?php 

foreach($dataSearch as $result){ ?>
    <div>
                <img src="avatars/<?php echo $result["avatar"] ?>" alt="avatar">
                <h3><?php echo $result['firstname'] . " " . $result['lastname']?></h3>
                <h4><?php echo $result['year']?></h4>
                
    </div>
    <?php } ?>


</body>
</html>