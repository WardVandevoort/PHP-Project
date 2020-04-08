<?php

include_once(__DIR__ . "/database.php");

class UserProfile{
    private $user;
    private $password;
    private $firstname;
    private $lastname;
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
    private $gamegenre;
    private $music;
    private $sport;
    private $buddy;


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
        $this->town = $town;

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
     * Get the value of buddy
     */ 
    public function getBuddy()
    {
        return $this->buddy;
    }

    /**
     * Set the value of buddy
     *
     * @return  self
     */ 
    public function setBuddy($buddy)
    {
        $this->buddy = $buddy;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

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
     * Get the value of gamegenre
     */ 
    public function getGamegenre()
    {
        return $this->gamegenre;
    }

    /**
     * Set the value of gamegenre
     *
     * @return  self
     */ 
    public function setGamegenre($gamegenre)
    {
        $this->gamegenre = $gamegenre;

        return $this;
    }

    public function fetchData(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select * from users where id like :user" );

        $user = $this->getUser();

        $statement->bindValue(":user", $user);

        $statement->execute();
        
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $data;
    }

    public static function getEmails(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("select email from users");
        
        $statement->execute();
        
        $emailAdressen = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $emailAdressen;
    }

    /*// BEGIN FEATURE 7 --------------------------------------------------------
    

    // 
    public static function getCurrentPassion($passion){
       
        $conn = Database::getConnection();

        $statement = $conn->prepare("select * from users where passion = '$passion'");
        $statement->execute();
        $passion = $statement->fetch(PDO::FETCH_ASSOC);
        if(empty($passion)){
                throw new Exception("We hebben niets gevonden!");
        }

        return $passion;
    }

    //Get current active user
    public static function getCurrentUser($email){

        $conn = Database::getConnection();

        $statement = $conn->prepare("select * from users where email = '$email'");
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if(empty($user)){
                throw new Exception("current user not found.");
        }else if(!empty($user)){
            // var_dump($user);
        }
        return $user;
    }
    private $foundBuddy;
    private $foundPassion;
    private $foundMovie;

    public function getFoundBuddy(){
        return $this->foundBuddy;
    }
    
    // public function setFoundBuddy(){
    //     $this->foundBuddy = $foundBuddy;
    //     return $this;
    // }


    public function getFoundPassion(){
        return $this->foundPassion;
    }
    
    // public function setFoundPassion(){
    //     $this->foundBuddy = $foundPassion;
    //     return $this;
    // }


    public function getFoundMovie(){
        return $this->foundMovie;
    }
    
    // public function setFoundMovie(){
    //     $this->foundBuddy = $foundMovie;
    //     return $this;
    // }


        
    public function getMatch(){
        $conn = Database::getConnection();
        $statement = $conn->prepare("SELECT * FROM users WHERE buddy != :foundbuddy AND passion LIKE :foundpassion OR movie LIKE :foundmovie" );


        $statement->execute();
        $match = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(empty($match)){
            throw new Exception("no friends found.");
            var_dump($match);
        }
        return $match;
    }

    
    public function getUserInfo($user){
        $conn = Database::getConnection();
        $statement = $conn->prepare("select user, firstname, lastname, avatar from users where id = '$user'");

        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_OBJ);
        return $user;
    }




    // EINDE FEATURE 7 ----------------------------------------------------------*/



    public function save(){
        $conn = Database::getConnection();
        
        $statement = $conn->prepare("update users set avatar=:avatar, year=:year, description=:description, 
                                     province=:province, town=:town, passion=:passion, os=:os, movie=:movie,
                                     game=:game, gamegenre=:gamegenre, music=:music, sport=:sport, 
                                     buddy=:buddy, firstname=:firstname, lastname=:lastname,
                                     password=:password, email=:email where id like :user");
        
        $user = $this->getUser();  
        $firstname = $this->getFirstname();   
        $lastname = $this->getLastname();                         
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
        $gamegenre = $this->getGamegenre();
        $music = $this->getMusic();
        $sport = $this->getSport();
        $buddy = $this->getBuddy();
        $password = $this->getPassword();

        /*$foundBuddy = $this->getFoundBuddy();
        $foundPassion = $this->getFoundPassion();
        $foundMovie = $this->getFoundMovie();*/


        $statement->bindValue(":user", $user);
        $statement->bindValue(":firstname", $firstname);
        $statement->bindValue(":lastname", $lastname);
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
        $statement->bindValue(":gamegenre", $gamegenre);
        $statement->bindValue(":music", $music);
        $statement->bindValue(":sport", $sport);
        $statement->bindValue(":buddy", $buddy);
        $statement->bindValue(":password", $password);

        
// HIERONDER ZIT DE FOUT DAT UW PROFIEL NIET MEER UPDATE   

        // $statement->bindValue(":foundBuddy", $foundBuddy);
        // $statement->bindValue(":foundPassion", $foundPassion);
        // $statement->bindValue(":foundMovie", $foundMovie);

        
        $result = $statement->execute();
        
        return $result;
        
        
    }

}

?>