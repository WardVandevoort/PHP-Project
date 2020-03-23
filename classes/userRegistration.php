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

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of passwordConfirmation
     */ 
    public function getPasswordConfirmation()
    {
        return $this->passwordConfirmation;
    }

    /**
     * Set the value of passwordConfirmation
     *
     * @return  self
     */ 
    public function setPasswordConfirmation($passwordConfirmation)
    {
        $this->passwordConfirmation = $passwordConfirmation;

        return $this;
    }

    /**
     * Get the value of year
     */ 
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of passion
     */ 
    public function getPassion()
    {
        return $this->passion;
    }

    /**
     * Set the value of passion
     *
     * @return  self
     */ 
    public function setPassion($passion)
    {
        $this->passion = $passion;

        return $this;
    }

    /**
     * Get the value of hobby
     */ 
    public function getHobby()
    {
        return $this->hobby;
    }

    /**
     * Set the value of hobby
     *
     * @return  self
     */ 
    public function setHobby($hobby)
    {
        $this->hobby = $hobby;

        return $this;
    }

    public function save(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("insert into users (firstname, lastname, email, password, year, passion, hobby) 
                                    values (:firstname, :lastname, :email, :password, :year, :passion, :hobby)");
        
        $firstName = $this->getFirstName();
        $lastName = $this->getLastName();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $year = $this->getYear();
        $passion = $this->getPassion();
        $hobby = $this->getHobby();
        
        $statement->bindValue(":firstname", $firstName);
        $statement->bindValue(":lastname", $lastName);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);
        $statement->bindValue(":year", $year);
        $statement->bindValue(":passion", $passion);
        $statement->bindValue(":hobby", $hobby);

        
        
        $result = $statement->execute();
        
        return $result;
        
        
    }


}

?>