<?php

include_once(__DIR__ . "/database.php");

class User{
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $passwordConfirmation;
  


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
        if(empty($firstName)){
            throw new Exception("Voornaam mag niet leeg zijn");
        }

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
        if(empty($lastName)){
            throw new Exception("Familienaam mag niet leeg zijn");
        }

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
        if(empty($email)){
            throw new Exception("Email mag niet leeg zijn");
        }

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
        if(empty($password)){
            throw new Exception("Paswoord mag niet leeg zijn");
        }

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
        if(empty($passwordConfirmation)){
            throw new Exception("Bevestig paswoord mag niet leeg zijn");
        }

        $this->passwordConfirmation = $passwordConfirmation;

        return $this;
    }

    public function save(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("insert into users (firstname, lastname, email, password) 
                                    values (:firstname, :lastname, :email, :password)");
        
        $firstName = $this->getFirstName();
        $lastName = $this->getLastName();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $password = password_hash($password, PASSWORD_DEFAULT, ["cost" => 14]);
        
        
        $statement->bindValue(":firstname", $firstName);
        $statement->bindValue(":lastname", $lastName);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);
        

        
        
        $result = $statement->execute();
        
        return $result;
        
        
    }

    public static function getEmails(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select email from users");
        
        $statement->execute();
        
        $emailAdressen = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $emailAdressen;
        }


}

?>