<?php
include_once "../controller/userlistC.php";

session_start();
$UserC= new userlistC();
$var=$UserC->allusers();
$user1 = $_SESSION['user'];
//Tri code SQL
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $order = "ASC";
    if ($sort == 'desc') {
        $order = "DESC";
    }
    $sql = "SELECT * FROM userlist ORDER BY age $order";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $var = $query->fetchAll();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
if(isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other desired page
    header("Location: login.php");
    exit;
}
// recherche code SQL
if (isset($_POST['choix'])) {
    if ($_POST['choix'] == 'nom') {
        $userlistc = new userlistc();
        $var = $userlistc->rechercherusername($_POST['Search']);
    }
    if ($_POST['choix'] == 'email') {
        $userlistc = new userlistC();
        $var = $userlistc->rechercheremail($_POST['Search']);
    }
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
						  <li><a class="ticker-btn" href="profil.php">Profil</a></li>	
				          <li><a class="ticker-btn" href="?logout=true">LogOut</a></li>				          				          
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
							<div class="d-flex justify-content-between">
								<!-- Tri Code html -->
							<form method="GET" action="" class="mb-3">
               					 <input type="hidden" name="sort" value="asc">
               					 <button type="submit" class="btn btn-primary">Tri Ascendant</button>
           					</form>
            				<form method="GET" action="" class="mb-3">
                				<input type="hidden" name="sort" value="desc">
                				<button type="submit" class="btn btn-primary">Tri Descendant</button>
            				</form>
							</div>
							<!-- Recherche code html -->
							<form method="POST" action="" class="d-flex justify-content-around mb-3">
    							<select name="choix" id="choix" class="form-select">
        						<option selected>Open this select menu</option>
        						<option value="nom">Username</option>
       							<option value="email">E-mail</option>
   							  </select>
    						    <input type="text" name="Search" class="form-control" placeholder="Search">
    							<input type="submit" class="btn btn-dark" onclick="return verif3();">
							</form>	
                            <div class="card">
							<div class="card-body">
					<div class="d-flex justify-content-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FullName</th>
                                    <th>UserName</th>
									<th>E-mail</th>
									<th>PassWord</th>
									<th>Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($var as $row){ ?>
                                    <tr>
                                        <td> <?php echo $row['id']; ?>   </td>
                                        <td> <?php echo $row['fullname']; ?>   </td>
                                        <td> <?php echo $row['username']; ?>   </td>
										<td> <?php echo $row['email']; ?>   </td>
                                        <td> <?php echo $row['pass']; ?>   </td>
										<td> <?php echo $row['age']; ?>   </td>
                                        <td>
                                            <a class="btn btn-primary" href="edit_a.php?id=<?php echo $row['id'] ?>">Edit</a>
                                            <a class="btn btn-danger" href="supprimer_a.php?id=<?php echo $row['id'] ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
						<a class="btn btn-link float-right mr-5 mb-5" href="http://localhost/userlist/back/afficherab.php">Administartion</a>
                    </div>
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



