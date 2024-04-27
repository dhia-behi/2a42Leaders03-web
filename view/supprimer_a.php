<?php 

$id = $_GET['id'];
include_once "../controller/userlistC.php";

$userlistC= new userlistC();
$userlistC->deleteuser($id); 
header('Location:afficher.php');
    
?>