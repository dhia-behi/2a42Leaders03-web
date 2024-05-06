<?php
// login_process.php

require_once "../controller/userlistC.php";
if (isset($_POST['email'])) {
    $email = $_POST['email'];

}
   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body class="banner-area relative" id="home">
<section class="pdt-120 pdb-120 mt-5 " >
    <div class="container" style="margin-top: 280px;">
        <div class="card">
            <div class="card-body">
            <h2>Enter your email here </h2>
            <form method="post" id="Form">
    <label for="email">E-mail:</label><br>
    <input type="text" id="emailInput" name="email" class="form-control"><br>
    <input type="submit" class="btn btn-secondary" value="Send">
</form>

<script>
    document.getElementById('Form').addEventListener('submit', function(event) {
        event.preventDefault(); // prevent the form from submitting
        
        // Get the email input value
        var email = document.getElementById('emailInput').value;

        // Redirect to resetpass.php with the email parameter
        window.location.href = 'resetpass.php?email=' + encodeURIComponent(email);
    });
</script>
        </div>
        
    </div>
        </div>
    </section> 
    <!-- Controle Saisie -->
    <script>
							let myForm = document.getElementById('Form')
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('username')
								let myRegex = /^[a-zA-Z0-9\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("Nom Prenom Obligatoire");
									e.preventDefault();
								}else if (myRegex.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect UserName (Exp: Ddia000)!");
									e.preventDefault();
								}
							});
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('pass')
								let myRegex1 = /^[a-zA-Z1-9$&./\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("PassWord obligatoire");
									e.preventDefault();
								}else if (myRegex1.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect PassWord (EXP : Dia@behi.$&pass)!");
									e.preventDefault();
								}
							});
						</script>           
</body>
</html>