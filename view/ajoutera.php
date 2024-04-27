<?php 
    // 
    include_once "../model/userlist.php";
    include_once "../controller/userlistC.php";
    
    if(isset($_POST['fullname'])){

        $user1 =  new userlist($_POST['fullname'],$_POST['username'],$_POST['email'],$_POST['pass'],$_POST['age']);
        $r=new userlistC();
        
        $r->adduser($user1);
		 header('Location:affichera.php');
    }
    else {
        ?>
		<!DOCTYPE HTML>
<html>
	<head>
		<title>Assist Heal</title>
		<link rel="icon" href="images/logo.jpg">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.html">Assist Heal</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#">User</a>
								<ul>
									<li><a href="affichera.php">Display Users List</a></li>
									<li><a href="ajoutera.php">Add User</a></li>
								</ul>
							</li>
							<li><a href="elements.html">Events</a></li>
							<li><a href="elements.html">Chats</a></li>
							<li><a href="elements.html">Donation</a></li>
						</ul>
					</nav>
				</header>
			<!-- Banner -->
				<section>
					<div>
					<div class="content">
						<header>
							<h2></h2>
							<p><br />
							 </p>
						</header>
					</div>
					</div>
					
				</section>
<section class="">
		<div class="container d-flex justify-content-center">
			<div class="">
				<div class="" data-wow-delay="0ms" data-wow-duration="500ms">
				</div>
				<div class="" data-wow-delay="0ms" data-wow-duration="1000ms">
					<div class="container ">
						<h3 class="mrt-0 mrb-30 d-flex justify-content-center">Add a User</h3>
						<form method="POST" id="myForm">
							<div class="row">
                            <div class="col-lg-12">
									<div class="form-group">
										<label for=""></label>
										<input type="text" placeholder="Your FullName" name="fullname" class="form-control" id="fullname">
									</div>
									<span id="error"></span>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
									<label for=""></label>
										<input type="text" placeholder="Your UserName" name="username" class="form-control" id="username">
									</div>
									<span id="error"></span>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
									<label for=""></label>
										<input type="text" placeholder="Your E-mail" name="email" class="form-control" id="email">
									</div>
									<span id="error"></span>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
									<label for=""></label>
										<input type="password" placeholder="Your PassWord" name="pass" class="form-control" id="pass">
									</div>
									<span id="error"></span>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
									<label for=""></label>
										<input type="text" placeholder="Your Age" name="age" class="form-control" id="age">
									</div>
									<span id="error"></span>
								</div>

								<div class="col-lg-12">
									<div class="form-group mrb-0">
										<button type="submit" class="btn btn-secondary mt-2">Add User</button>
										<a href="affichera.php" class="btn btn-link mt-2">Display List Of Users</a>
									</div>
								</div>
							</div>
						</form>
						<script>
							let myForm = document.getElementById('myForm')
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('fullname')
								let myRegex = /^[a-zA-Z-\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("Nom et Prenom Obligatoire");
									e.preventDefault();
								}else if (myRegex.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect Nom Prenom (Exp: Mahdi-kalfat)!");
									e.preventDefault();
								}
							});
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('username')
								let myRegex1 = /^[1-9a-zA-Z\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("le CIN est obligatoire");
									e.preventDefault();
								}else if (myRegex1.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect CIN (EXP : 145433)!");
									e.preventDefault();
								}
							});
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('email')
								let myRegex2 = /^[@.a-zA-Z1-9\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("le Matricule est obligatoire");
									e.preventDefault();
								}else if (myRegex2.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect Matricule (Exp : 234TUN5433)!");
									e.preventDefault();
								}
							});
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('pass')
								let myRegex3 = /^[1-9a-zA-Z\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("la Marque est Obligatoire");
									e.preventDefault();
								}else if (myRegex2.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect Marque (Exp : BMW)!");
									e.preventDefault();
								}
							});
							myForm.addEventListener('submit', function(e){
								let myInput = document.getElementById('age')
								let myRegex4 = /^[1-9\s]+$/;
								if(myInput.value.trim() == ""){
									let myError = document.getElementById('error');
									alert("la Marque est Obligatoire");
									e.preventDefault();
								}else if (myRegex2.test(myInput.value) == false){
									let myError = document.getElementById('error');
									alert("Saisie Incorrect Type (Exp : Berline)!");
									e.preventDefault();
								}
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</section>
		<!-- One -->
		<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="https://file1.topsante.com/var/topsante/storage/images/maman-et-enfant/enfants/bien-grandir/relations-parents-enfant-leur-qualite-influence-la-sante-a-l-age-adulte-613700/8717296-1-fre-FR/Relations-parents-enfant-leur-qualite-influence-la-sante-a-l-age-adulte.jpg?alias=original" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="col-4 col-12-medium">
									<header>
										<h2>Understanding Psychology Disorders in Children</h2>
										<p>Children, like adults, can experience a range of psychological challenges that impact their emotional well-being,
											 behavior, and overall quality of life.</p>
									</header>
								</div>
								<div class="col-4 col-12-medium">
									<p>These challenges, often referred to as psychology disorders,
										encompass a variety of conditions that may affect a child's thoughts, feelings, and behaviors.
										From anxiety and depression to attention-deficit hyperactivity disorder (ADHD) and autism spectrum disorders, each child's experience is unique.
										It's crucial to approach these conditions with empathy, patience, and a deep understanding of the child's individual needs.</p>
								</div>
								<div class="col-4 col-12-medium">
									<p>In this space, we aim to shed light on the diverse landscape of psychology disorders in children.
										 We'll explore common conditions, share valuable resources, and provide practical insights for parents, caregivers, 
										 and professionals who support these young individuals on their journey towards mental health and well-being.
										
										 Our goal is to foster a community of compassion, where we can learn, grow, and advocate for the mental health of our children.
										 Together, we can create a nurturing environment that empowers every child to thrive, no matter the challenges they face.</p>
								</div>
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
				<section id="two" class="spotlight style2 right">
					<span class="image fit main">
						<img src="images/img.png" alt="" /></span>
					<div class="content">
						<header>
							<p>Raising Awareness, Fostering Understanding :</p>
							<h2>Join Our Events for Children's Psychology Disorders</h2>
						</header>
						<p>Welcome to our dedicated space for events aimed at spreading awareness and understanding of psychological disorders in children.
							 Here, we bring together a community of advocates, parents, caregivers, and professionals who share a common goal:
							 to support and uplift children facing mental health challenges.</p>
						<ul class="actions">
							<li><a href="elements.html" class="button">Learn More</a></li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</section>

			<!-- Three -->
				<section id="three" class="spotlight style3 left">
					<span class="image fit main bottom"><img src="https://media.licdn.com/dms/image/D4E22AQGlpKHC9T3z4Q/feedshare-shrink_800/0/1696252063197?e=1700092800&v=beta&t=T2RZS3vMAWl7o21oz8VGCtmknXyXFrPTrEDUrNBSmGw" alt="" /></span>
					<div class="content">
						<header>
							<h2>"Connect & Support: Chat with Professionals & Parents"</h2>
							<!--<p>Accumsan integer ultricies aliquam vel massa sapien phasellus</p> -->
						</header>
						<p>In this section, find help and motivation from professionals and parents who understand. Engage in conversations, seek advice, and build a community focused on children's psychology disorders.
							 Together, we can navigate this journey towards healing and resilience. Join the conversation now.</p>
						<ul class="actions">
							<li><a href="#" class="button">Learn More</a></li>
						</ul>
					</div>
					<a href="#four" class="goto-next scrolly">Next</a>
				</section>

			<!-- Four -->
				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2>Accumsan sed tempus adipiscing blandit</h2>
							<p>Iaculis ac volutpat vis non enim gravida nisi faucibus posuere arcu consequat</p>
						</header>
						<div class="box alt">
							<div class="row gtr-uniform">
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon solid alt major fa-chart-area"></span>
									<h3>Ipsum sed commodo</h3>
									<p>Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon solid alt major fa-comment"></span>
									<h3>Eleifend lorem ornare</h3>
									<p>Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon solid alt major fa-flask"></span>
									<h3>Cubilia cep lobortis</h3>
									<p>Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon solid alt major fa-paper-plane"></span>
									<h3>Non semper interdum</h3>
									<p>Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon solid alt major fa-file"></span>
									<h3>Odio laoreet accumsan</h3>
									<p>Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon solid alt major fa-lock"></span>
									<h3>Massa arcu accumsan</h3>
									<p>Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor.</p>
								</section>
							</div>
						</div>
						<footer class="major">
							<ul class="actions special">
								<li><a href="#" class="button">Magna sed feugiat</a></li>
							</ul>
						</footer>
					</div>
				</section>

			<!-- Five -->
				<section id="five" class="wrapper style2 special fade">
					<div class="container">
						<header>
							<h2>Stay Informed! Get Updates via Email</h2>
							<p>Receive the latest news, updates, and important notifications directly to your inbox. Just enter your email below :</p>
						</header>
						<form method="post" action="#" class="cta">
							<div class="row gtr-uniform gtr-50">
								<div class="col-8 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Your Email Address" /></div>
								<div class="col-4 col-12-xsmall"><input type="submit" value="Get Started" class="fit primary" /></div>
							</div>
						</form>
					</div>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php } ?> 