<?php 
require '../config.php';
class userlistC   {
    
    public function adduser($user)
    {
      $sql = "INSERT INTO userlist VALUES (NULL,:fullname, :username, :email, :pass, :age,:verif,:verif_pass)";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "fullname" => $user->getfullname(),
          "username" => $user->getusername(),
          "email" => $user->getemail(),
          "pass" => $user->getpass(),
          "age" => $user->getage(),
          "verif"=>$user->getverification(),
          "verif_pass" => $user->getverification_pass(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  
    public function updateuser($user,$id)
    {
      $sql = "UPDATE userlist SET fullname=:fullname,username=:username,email=:email,pass=:pass,age=:age WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
          "fullname" => $user->getfullname(),
          "username" => $user->getusername(),
          "email" => $user->getemail(),
          "pass" => $user->getpass(),
          "age" => $user->getage(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  
    public function deleteuser($id)
    {
      $sql = "DELETE FROM userlist WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }

    public function allusers()
    {
      $sql = "SELECT * FROM userlist";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute();
        $service = $query->fetch();
        $res = [];
        for ($x = 0; $service; $x++) {
          $res[$x] = $service;
          $service = $query->fetch();
        }
        return $res;
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
    public function findusers($id)
    {
      $sql = "SELECT * FROM userlist WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
        ]);
        $service = $query->fetch();
  
        return $service;
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
    public function findUserByUsernameAndPassword($username, $pass)
    {
        $sql = "SELECT * FROM userlist WHERE username = :username";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['username' => $username]);
            $user = $query->fetch();
    
            if ($user && $pass === $user['pass']) {
                // Password matches (comparing as strings)
                return $user;
            } else {
                // Invalid username or password
                return false;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function findUserByemail($email)
    {
        $sql = "SELECT * FROM userlist WHERE email = :email";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['email' => $email]);
            $user = $query->fetch();
    
            if ($user) {
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    function rechercherusername($username){
      $sql="SELECT * From userlist WHERE username= '$username' ";
      $db = config::getConnexion();
      try{
      $liste=$db->query($sql);
      return $liste;
      }
      catch (Exception $e){
        die('Erreur: '.$e->getMessage());
      }	
    }
    
    function rechercheremail($email){
      $sql="SELECT * From userlist WHERE email = '$email' ";
      $db = config::getConnexion();
      try{
      $liste=$db->query($sql);
      return $liste;
      }
      catch (Exception $e){
        die('Erreur: '.$e->getMessage());
      }	
    }
}
?>


