<?php 

class userlist{

   private $fullname;
   private $username;
   private $email;
   private $pass;
   private $age;
   private $verification;
   private $verification_pass;

    public $userAttributeCount=8;

    function getfullname(){
        return $this->fullname;
    }
    function getusername(){
        return $this->username;
    }
    function getemail(){
        return $this->email;
    }
    function getpass(){
        return $this->pass;
    }
    function getage(){
        return $this->age;
    }
    function getverification(){
        return $this->verification;
    }
    function getverification_pass(){
        return $this->verification_pass;
    }

    
    function __construct($fullname,$username,$email,$pass,$age,$verification,$verification_pass){
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
        $this->pass = $pass;
        $this->age = $age;
        $this->verification=$verification;
        $this->verification_pass=$verification_pass;
    }
    


    function affichage(){  
    } 
}
?>


