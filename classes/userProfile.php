<?php

include_once(__DIR__ . "/database.php");

class UserProfile{
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

    public function fetchData(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select * from users where email like :user" );

        $user = $this->getUser();

        $statement->bindValue(":user", $user);

        $statement->execute();
        
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $data;
    }

}

?>