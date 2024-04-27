<?php 
    include_once "../model/userlist.php";
    include_once "../controller/userlistC.php";
$rec = null;

$id = $_GET['id'];
$userlistC= new userlistC();
$currentuser = $userlistC->findusers($id);
if (
    isset($_POST["fullname"])
) {
    if (
        !empty($_POST["fullname"])
        
    ) {
        $user = new userlist(
            $_POST['fullname'],
			$_POST['username'],
			$_POST['email'],
			$_POST['pass'],
			$_POST['age'],
		);
        $userlistC->updateuser($user,$id);
        header('Location:afficher.php');
    } else
        $error = "Missing information";
}
    ?>
		<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Job Listing</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.html">Home</a></li>
				          <li><a href="about-us.html">About Us</a></li>
				          <li><a href="category.html">Category</a></li>
				          <li><a href="price.html">Price</a></li>
				          <li><a href="blog-home.html">Blog</a></li>
				          <li><a href="contact.html">Contact</a></li>
				          <li class="menu-has-children"><a href="">Pages</a>
				            <ul>
								<li><a href="elements.html">elements</a></li>
								<li><a href="search.html">search</a></li>
								<li><a href="single.html">single</a></li>
				            </ul>
				          </li>
				          <li><a class="ticker-btn" href="login.php">LogOut</a></li>				          				          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12">
							<h1 class="text-white">
								<span>User</span> List		
							</h1>
                            <br>	
                            <div class="card"><div class="card-body">
							<form action="" method="POST" id="Form">
							<div class="row">
                            <div class="col-lg-12">
									<div class="form-group">
										<label for=""></label>
									<input value="<?= $currentuser['fullname']?>" type="text" placeholder="Your FullName" name="fullname" class="form-control" id="fullname">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
									<label for=""></label>
									<input value="<?= $currentuser['username']?>" type="text" placeholder="Your UserName" name="username" class="form-control" id="username">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
									<label for=""></label>
									<input value="<?= $currentuser['email']?>" type="text" placeholder="Your E-mail" name="email" class="form-control" id="email">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
									<label for=""></label>
									<input value="<?= $currentuser['pass']?>" type="password" placeholder="Your PassWord" name="pass" class="form-control" id="pass">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
									<label for=""></label>
									<input value="<?= $currentuser['age']?>" type="text" placeholder="Your Age" name="age" class="form-control" id="age">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group mrb-0">
										<button type="submit" class="btn btn-primary mt-3">Edit User</button>
										<a href="afficher.php" class="btn btn-link mt-3">Display List Of Users</a>
									</div>
								</div>
							</div>
						</form>

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
					
                    </div>
                        </div>
						</div>											
					</div>
				</div>
			</section>		
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Top Products</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Newsletter</h6>
								<p>You can trust us. we only send promo offers, not a single spam.</p>
								<div id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
												<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
											</div> 
										
											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
											</div> 
										</div>		
										<div class="info"></div>
									</form>
								</div>		
							</div>
						</div>
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Instragram Feed</h6>
								<ul class="instafeed d-flex flex-wrap">
									<li><img src="img/i1.jpg" alt=""></li>
									<li><img src="img/i2.jpg" alt=""></li>
									<li><img src="img/i3.jpg" alt=""></li>
									<li><img src="img/i4.jpg" alt=""></li>
									<li><img src="img/i5.jpg" alt=""></li>
									<li><img src="img/i6.jpg" alt=""></li>
									<li><img src="img/i7.jpg" alt=""></li>
									<li><img src="img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>						
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>
	
<?php  ?> 