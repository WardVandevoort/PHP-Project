<?php

include_once(__DIR__ . "/database.php");

class User{
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $passwordConfirmation;
    private $year;
    private $passion;
    private $hobby;


    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function save(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("insert into users (firstname) values (:firstname)");
        
        $firstName = $this->getFirstName();
        
        
        $statement->bindValue(":firstname", $firstName);
        
        
        $result = $statement->execute();
        
        return $result;
        
        
        }
}

?>