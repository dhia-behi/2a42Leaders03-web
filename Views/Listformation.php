<?php
include '../Controller/formationC.php';
$formationC = new FormationC();
$list = $formationC->listformation();
$error = "";
$formationa = null;
$formationCa = new FormationC();

/* $idf= $_POST['search'];
$titref= $_POST['search'];
$domainef= $_POST['search'];
$format = new FormationC();
$lis=$format->searchformation($idf,$titref,$domainef);
 <?php
if ( isset($_POST["search"]) && !empty($_POST['search']) ) {
foreach ($lis as $formation) {

     }else{
 ?>*/


if (
isset($_POST["titre"]) &&
isset($_POST["domaine"]) &&
isset($_POST["descreption"]) &&
isset($_POST["date_debut"])&&
isset($_POST["date_fin"]) &&
isset($_POST["nombre_heure"]) &&
isset($_POST["status"]) &&
isset($_POST["prix"])
    
) {
if (
!empty($_POST['titre']) &&
!empty($_POST['domaine']) &&
!empty($_POST['descreption']) &&
!empty($_POST['date_debut'])&&
!empty($_POST['date_fin']) &&
!empty($_POST['nombre_heure']) &&
!empty($_POST['status']) &&
!empty($_POST['prix'])
) {
$formationa = new formation(
null,
$_POST['titre'],
$_POST['domaine'],
$_POST['descreption'],
new DateTime($_POST['date_debut']),
new DateTime($_POST['date_fin']),
$_POST['nombre_heure'],
$_POST['status'],
$_POST['prix']
);
$formationCa->addformation($formationa);
header('Location:http://localhost/marwenprojet/View/Listformation.php');
} else
$error = "Missing information";
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <script src="view/js/trytest.js"></script>
    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="listformation.php">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="listformation.php">gestion formation</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">


                    </ul>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="listformation.php">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="listformation.php">gestion formation</a>
                                </li>

                            </ul>
                        </li>


                        <li class="has-sub">

                        </li>
                        <li class="has-sub">

                    </ul>
                    </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form   class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" id="searchForm"
                                    placeholder="Search for datas" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                           
         <script>                   
    // document.getElementById('searchForm').addEventListener('submit', function(event) {
    //     event.preventDefault(); // Empêcher l'envoi du formulaire par défaut
    //     var formData = new FormData(this);

    //     // Envoyer la requête AJAX
    //     var xhr = new XMLHttpRequest();
    //     xhr.open('POST', '../search_formations.php', true);
    //     xhr.onload = function() {
    //         if (xhr.status === 200) {
    //             // Mettre à jour le tableau des formations avec les résultats de la recherche
    //             document.getElementById('formationTable').innerHTML = xhr.responseText;
    //         }
    //     };
    //     xhr.send(formData);
    // });
</script>
                            
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->


<script>
   function test22() {
    const date1= document.getElementById('date_debut').value;
    const date2=document.getElementById('date_fin').value;
   // const email= document.getElementById('mail').value;
    const domaine= document.getElementById('domaine').value;
    const prix = document.getElementById('prix').value;
    const nombre_heure = document.getElementById('nombre_heure').value;
    
    // Allow only digits
    const nbValue = parseInt(nombre_heure);
    const date1Object = new Date(date1);
    const date2Object = new Date(date2);
  //  const patternEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const patternDate = /^\d{4}-\d{2}-\d{2}$/;
    const patterndomaine = /^[^0-9]+$/;
    const patternPrice = /^\d+(\.\d{1,2})?$/; 
    const patternNb = /^\d+$/;
    
          if ( nombre_heure === "" ||domaine === ""||date1 === ""||date2 === "" || prix === "") {
            alert("remplir les champs");
            return false;
          }
          if (!patternNb.test(nombre_heure) || nbValue < 10 || nbValue > 99) {
            alert("The nombre_heure must be between 10 and 99 (inclusive).");
            return false;
          }

         if (!patterndomaine.test(domaine)) {
            alert("The domaine must not contain any digits.");
            return false;}
            if (!patternPrice.test(prix)) {
            alert("The price must be a valid number with an optional decimal point.");
            return false;
          }
          if (date1Object > date2Object) {
            alert("Datedebut must be earlier than or equal to Datefin.");
            return false;
          }
          
          return true;
        }
</script>       

            <!-- MAIN CONTENT-->
            <div class="main-content">

                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-header">
                            <strong>Formation</strong> ifo
                        </div>
                        <div class="card-body card-block">
                        <script src="js/trytest.js"></script>
                            <div id="error">
                                <?php echo $error; ?>
                            </div>
                            <form action=""  method="post" class="form-horizontal" onsubmit="return test22();   ">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="titre" class=" form-control-label">titre</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="titre" name="titre" placeholder="Enter Titre"
                                            class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="domaine" class=" form-control-label">domaine</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="single-element-widget">
                                        
                                            <div class="default-select" id="default-select">
                                                <select name="domaine">
                                                    <option >Informatique </option>
                                                    <option >Sciences </option>
                                                    <option >Ingénierie </option>
                                                    <option >Arts et design</option>
                                                    <option >Santé et médecine</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="descreption" class=" form-control-label">descreption</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="descreption" name="descreption"
                                            placeholder="Enter descreption" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="date_debut" class=" form-control-label">date_debut</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="date_debut" name="date_debut" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="date_fin" class=" form-control-label">date_fin</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="date_fin" name="date_fin" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nombre_heure" class=" form-control-label">nombre_heure</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="nombre_heure" name="nombre_heure"
                                            placeholder="Enter nombre_heure" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="status" class=" form-control-label">status</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                         <div class="single-element-widget">
                                        
                                            <div class="default-select" id="default-select">
                                                <select name="status">
                                                    <option >encour </option>
                                                    <option >expiree </option>
                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="prix" class=" form-control-label">prix</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="prix" name="prix" placeholder="Enter prix"
                                            class="form-control">
                                    </div>
                                </div>
                        </div>

                        <script src="main.js"></script>
                        <div class="card-footer">
                            <button type="submit" value="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit</button>

                            <button type="reset" value="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                        </form>
                    </div>


                    <br>
                    <div class="col-lg-15">


                        <div id="resultTable" class="table-responsive m-b-40">
                                <table id="resultTable" class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>idformation</th>
                                            <th>titre</th>
                                            <th>domaine</th>
                                            <th>descreption</th>
                                            <th id="sortdate" class="sort" onclick="sortTable(4)"> <button id="sortAscButton" class="btn btn-outline-link"></button>date_debut</th>
                                            <th>date_fin</th>
                                            <th>nombre_heure</th>
                                            <th>status</th>
                                            <th>prix</th>
                                            <th><button id="resetButton" class="btn btn-outline-link"></button></th>
                                            <th></th>
                                        </tr>
                                    </thead>
<tbody >
                                    <?php
                                            
                                                foreach ($list as $formation) {
                                                ?>
                                    <tr>
                                        <td>
                                            <?= $formation['idformation']; ?>
                                        </td>
                                        <td>
                                            <?= $formation['titre']; ?>
                                        </td>
                                        <td>
                                            <?= $formation['domaine']; ?>
                                        </td>
                                        <td>
                                            <?= $formation['descreption']; ?>
                                        </td>
                                        <td>
                                            <?= $formation['date_debut']; ?>
                                        </td>
                                        <td>
                                            <?= $formation['date_fin']; ?>
                                        </td>
                                        <td>
                                            <?= $formation['nombre_heure']; ?>
                                        </td>
                                        <td>
                                            <?= $formation['status']; ?>
                                        </td>
                                        <td>
                                            <?= $formation['prix']; ?>
                                        </td>
                                        <td align="center">
                                            <form method="POST" action="updateformation.php">
                                                <div class="container py-2">
                                                    <button class="btn btn-info" type="submit" name="update"
                                                        value="update">Update</button>
                                                    <input type="hidden" value=<?PHP echo $formation['idformation']; ?>
                                                    name="idformation">
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST"
                                                action="deleteformation.php?idformation=<?php echo $formation['idformation']; ?>">
                                                <div class="container py-2">
                                                    <button class="btn btn-danger" type="submit" name="Delete"
                                                        value="Delete">Delete</a>
                                            </form>
                                        </td>

                                        <?php
                                            }
                                            ?>
                                            </tbody>
                                </table>
                                <script>
    // JavaScript avec AJAX
        document.getElementById("searchForm").addEventListener("input", function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchForm");
        filter = input.value.toUpperCase();
        table = document.getElementById("resultTable");
        tr = table.getElementsByTagName("tr");

        // Parcourt toutes les lignes et masque celles qui ne correspondent pas à la recherche
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]; // Colonne ID
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });


    var originalRows; // Pour stocker les lignes originales du tableau

    function sortTable(column, ascending) {
        var table = document.getElementById("resultTable").getElementsByTagName('tbody')[0];
        var rows = Array.from(table.rows);

        rows.sort(function(a, b) {
            var valueA = Date.parse(a.cells[column].textContent);
            var valueB = Date.parse(b.cells[column].textContent);
            return ascending ? valueA - valueB : valueB - valueA;
        });

        for (var i = 0; i < rows.length; i++) {
            table.appendChild(rows[i]);
        }
    }

    document.getElementById("sortAscButton").addEventListener("click", function() {
        sortTable(4, true); // Tri ascendant par la colonne 'note' (index 2)
    });
    document.getElementById("resetButton").addEventListener("click", function() {
        var table = document.getElementById("resultTable").getElementsByTagName('tbody')[0];
        table.innerHTML = ""; // Efface le contenu du tbody
        originalRows.forEach(function(row) {
            table.appendChild(row);
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var table = document.getElementById("resultTable").getElementsByTagName('tbody')[0];
        originalRows = Array.from(table.rows);
    });

                                    </script>
                            </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>
        <script src="js/trytest.js"></script>


</body>

</html>
<!-- end document-->