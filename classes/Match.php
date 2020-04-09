<?php

include_once(__DIR__ . "/database.php");

class BuddyMatch{

private $user;


/**
 * Get the value of user
 */ 
public function getUser()
{
return $this->user;
}

/**
 * Set the value of user
 *
 * @return  self
 */ 
public function setUser($user)
{
$this->user = $user;

return $this;
}

public function fetchUser(){
    $conn = Database::getConnection();
    
    $statement = $conn->prepare("select * from users where id like :user" );

    $user = $this->getUser();

    $statement->bindValue(":user", $user);

    $statement->execute();
    
    $userData = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $userData;
}
}

?>

