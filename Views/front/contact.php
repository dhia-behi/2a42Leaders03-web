<?php

include __DIR__ . '/../path_to_config/config.php';
include __DIR__ . '/../path_to_offre/Offre.php';
include __DIR__ . '/../path_to_offreC/OffreC.php'; // Include the file where OffreC is defined



$offreC = new OffreC();
$types = $offreC->afficherTypesOffre();

if (
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["date_debut"]) &&
    isset($_POST["date_fin"]) &&
    isset($_POST["localisation"]) &&
    isset($_POST["type"])
) {

    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];
    $localisation = $_POST["localisation"];
    $type = $_POST["type"];

    $offre = new Offre(0, $nom, $description, $prix, $date_debut, $date_fin, $localisation, $type);

    $offreC->ajouterOffre($offre);

    header("Location:try.php");
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Offre.nom, TypeOffre.nom, TypeOffre.description FROM Offre INNER JOIN TypeOffre ON Offre.type_id = TypeOffre.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><caption>Table</caption><thead><tr><th scope='col'>Offre.nom</th><th scope='col'>TypeOffre.nom</th><th scope='col'>TypeOffre.description</th></tr></thead><tbody>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td data-label='Offre.nom'>".$row["Offre.nom"]."</td><td data-label='TypeOffre.nom'>".$row["TypeOffre.nom"]."</td><td data-label='TypeOffre.description'>".$row["TypeOffre.description"]."</td></tr>";
  }
  echo "</tbody></table>";
} else {
  echo "0 results";
}
$conn->close();
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
			
				<!-- existing head content -->
			
				<style>
					table {
						border: 1px solid #ccc;
						border-collapse: collapse;
						margin: 0;
						padding: 0;
						width: 100%;
						table-layout: fixed;
					}
			
					table caption {
						font-size: 1.5em;
						margin: .5em 0 .75em;
					}
			
					table tr {
						background-color: #f8f8f8;
						border: 1px solid #ddd;
						padding: .35em;
					}
			
					table th,
					table td {
						padding: .625em;
						text-align: center;
					}
			
					table th {
						font-size: .85em;
						letter-spacing: .1em;
						text-transform: uppercase;
					}
			
					@media screen and (max-width: 600px) {
						table {
							border: 0;
						}
			
						table caption {
							font-size: 1.3em;
						}
						
						table thead {
							border: none;
							clip: rect(0 0 0 0);
							height: 1px;
							margin: -1px;
							overflow: hidden;
							padding: 0;
							position: absolute;
							width: 1px;
						}
						
						table tr {
							border-bottom: 3px solid #ddd;
							display: block;
							margin-bottom: .625em;
						}
						
						table td {
							border-bottom: 1px solid #ddd;
							display: block;
							font-size: .8em;
							text-align: right;
						}
						
						table td::before {
							content: attr(data-label);
							float: left;
							font-weight: bold;
							text-transform: uppercase;
						}
						
						table td:last-child {
							border-bottom: 0;
						}
					}
			
					body {
						font-family: "Open Sans", sans-serif;
						line-height: 1.25;
					}
				</style>
			</head>
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
				          <li><a class="ticker-btn" href="#">Signup</a></li>
				          <li><a class="ticker-btn" href="#">Login</a></li>				          				          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contact Us</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
			<?php
				include_once 'TypeOffreC.php'; // Include your TypeOffreC class file

				$typeOffreC = new TypeOffreC();
				$listeTypesOffre = $typeOffreC->afficherTypesOffre();
			?>

				<table>
					<tr>
						<th>Id</th>
						<th>Nom</th>
						<th>Description</th>
						<th>Logo</th>
					</tr>
					<?php
					foreach ($listeTypesOffre as $typeOffre) {
						echo '<tr>';
						echo '<td>' . $typeOffre['id'] . '</td>';
						echo '<td>' . $typeOffre['nom'] . '</td>';
						echo '<td>' . $typeOffre['description'] . '</td>';
						echo '<td>' . $typeOffre['logo'] . '</td>';
						echo '</tr>';
					}
					?>
				</table>
			</section>
			<!-- End contact-page Area -->
			
	
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
						<div class="col-lg-6 col-md-12">
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



