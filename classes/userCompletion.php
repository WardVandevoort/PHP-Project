<?php 

include_once(__DIR__ . "/database.php");

class UserComp{
    private $imagePath;
    private $email;
    private $year;
    private $description;
    private $province;
    private $town;
    private $passion;
    private $os;
    private $movie;
    private $game;
    private $music;
    private $sport;

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
        if(empty($imagePath)){
            throw new Exception("Kies een profielfoto");
        }
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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of os
     */ 
    public function getOs()
    {
        return $this->os;
    }

    /**
     * Set the value of os
     *
     * @return  self
     */ 
    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Get the value of movie
     */ 
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set the value of movie
     *
     * @return  self
     */ 
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get the value of game
     */ 
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set the value of game
     *
     * @return  self
     */ 
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get the value of music
     */ 
    public function getMusic()
    {
        return $this->music;
    }

    /**
     * Set the value of music
     *
     * @return  self
     */ 
    public function setMusic($music)
    {
        $this->music = $music;

        return $this;
    }

    /**
     * Get the value of sport
     */ 
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Set the value of sport
     *
     * @return  self
     */ 
    public function setSport($sport)
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Get the value of province
     */ 
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the value of province
     *
     * @return  self
     */ 
    public function setProvince($province)
    {
        if(empty($province)){
            throw new Exception("Provincie mag niet leeg zijn");
        }
        $this->province = $province;

        return $this;
    }

    /**
     * Get the value of town
     */ 
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set the value of town
     *
     * @return  self
     */ 
    public function setTown($town)
    {
        if(empty($town)){
            throw new Exception("Gemeente/stad mag niet leeg zijn");
        }
        $this->town = $town;

        return $this;
    }

    public function save(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("update users set avatar=:avatar, year=:year, description=:description, 
                                     province=:province, town=:town, passion=:passion, os=:os, movie=:movie,
                                     game=:game, music=:music, sport=:sport, new=false where email like :email");
        
        $imagePath = $this->getImagePath();
        $email = $this->getEmail();
        $year = $this->getYear();
        $description = $this->getDescription();
        $province = $this->getProvince();
        $town = $this->getTown();
        $passion = $this->getPassion();
        $os = $this->getOs();
        $movie = $this->getMovie();
        $game = $this->getGame();
        $music = $this->getMusic();
        $sport = $this->getSport();
    
        $statement->bindValue(":avatar", $imagePath);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":year", $year);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":province", $province);
        $statement->bindValue(":town", $town);
        $statement->bindValue(":passion", $passion);
        $statement->bindValue(":os", $os);
        $statement->bindValue(":movie", $movie);
        $statement->bindValue(":game", $game);
        $statement->bindValue(":music", $music);
        $statement->bindValue(":sport", $sport);
        
        $result = $statement->execute();
        
        return $result;
        
        
    }
}


?>