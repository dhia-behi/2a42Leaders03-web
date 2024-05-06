<?php
    include_once "../model/userlist.php";
    include_once "../controller/userlistC.php";
 
    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];

        $userC= new userlistC(); // corrected variable name to $userC
        $user = $userC->findUserByemail($email);
        $verifcode = $user['verif'];
        

        $verification_code = $_POST["verification_code"];

        if ($verification_code == $verifcode)
        {
 
            $sql = "UPDATE userlist SET verif = null WHERE email = '" . $email . "'";
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
 
    <input type="submit" name="verify_email" value="Verify Email">
</form>
