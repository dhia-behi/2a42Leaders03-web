<?php
    include_once "../model/userlist.php";
    include_once "../controller/userlistC.php";
 
    if (isset($_POST["verify_pass"]))
    {
        $email = $_POST["email"];
        $password = $_POST["pass"];

        $userC= new userlistC();
        $user = $userC->findUserByemail($email);
        $verifcode = $user['verif_pass'];
        

        $verification_code = $_POST["verification_code"];

        if ($verification_code == $verifcode)
        {
 
            $sql = "UPDATE userlist SET verif = null,pass = '$password' WHERE email = '" . $email . "'";
            $db = config::getConnexion();
        
            $query = $db->prepare($sql);
            $query->execute();
            header('Location:login.php');
        } else { 
            die("Verification code failed.");
        }
    }
 
?>


<form method="POST">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="verification_code" placeholder="Enter verification code" required />
    <input type="text" name="pass" placeholder="Enter New PassWord" required />
 
    <input type="submit" name="verify_pass" value="Send">
</form>