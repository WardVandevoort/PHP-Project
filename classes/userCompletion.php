<?php 

include_once(__DIR__ . "/database.php");

class UserComp{
    private $imagePath;
    private $email;

    /**
     * Get the value of imagePath
     */ 
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * Set the value of imagePath
     *
     * @return  self
     */ 
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;

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

    public function save(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("update users set avatar = :avatar where email like :email");
        
        $imagePath = $this->getImagePath();
        $email = $this->getEmail();
    
        $statement->bindValue(":avatar", $imagePath);
        $statement->bindValue(":email", $email);
        
        $result = $statement->execute();
        
        return $result;
        
        
    }
}


?>