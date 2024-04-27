<?php 
    // 
    include_once "../model/userlist.php";
    include_once "../controller/userlistC.php";
    
    if(isset($_POST['fullname'])){

        $user1 =  new userlist($_POST['fullname'],$_POST['username'],$_POST['email'],$_POST['pass'],$_POST['age']);
        $r=new userlistC();
        
        $r->adduser($user1);
		 header('Location:login.php');
    }
    else {
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="icon" href="images/logo.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: white;">
    <div class="container" style="margin-top:270px;">
    <div class="card">
        <div class="card-body">
		<h2>Register</h2>
        <form action="registration.php" method="post" id="Form">
            <div class="form-group">
			<label for="username">FullName</label><br>
                <input type="text" class="form-control mb-2" name="fullname" id="fullname">
            </div>
            <div class="form-group">
			<label for="username">Username</label><br>
                <input type="emamil" class="form-control mb-2" name="username" id="username">
            </div>
            <div class="form-group">
			<label for="username">E-mail</label><br>
                <input type="emamil" class="form-control mb-2" name="email" id="email">
            </div>
            <div class="form-group">
			<label for="username">Age</label><br>
                <input type="password" class="form-control mb-2" name="age" id="age">
            </div>
            <div class="form-group">
			<label for="username">PassWord</label><br>
                <input type="password" class="form-control mb-2" name="pass" id="age">
            </div>
            <div class="form-btn">
			
                <input type="submit" class="btn btn-primary mb-2" value="Register" name="submit">
            </div>
        </form>
        
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
      </div>
    </div>
    </div>
	<!-- Controle Saisie -->
	<script>
							let myForm = document.getElementById('Form')
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('fullname')
								let myRegex = /^[a-zA-Z-\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("Nom Prenom Obligatoire");
									e.preventDefault();
								}else if (myRegex.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect Nom Prenom (Exp: Ddia Behi)!");
									e.preventDefault();
								}
							});
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
								let myInput = document.getElementById('email')
								let myRegex1 = /^[1-9a-zA-Z.@\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("E-mail obligatoire");
									e.preventDefault();
								}else if (myRegex1.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect E-mail (EXP : Dhia.behi@gmail.com)!");
									e.preventDefault();
								}
							});
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('age')
								let myRegex1 = /^[1-9\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("Age obligatoire");
									e.preventDefault();
								}else if (myRegex1.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect Age (EXP : 21)!");
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
<?php } ?> 