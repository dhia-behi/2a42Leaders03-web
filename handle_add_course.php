<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../controller/formationC.php';





ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $formation = new formation( $_POST['nom_formation'], $_POST['description'], $_POST['prix'], $_POST['type']);
    
    $formationController = new FormationC();
    $formationController->addFormation($formation);
    
    header('Location: ../view/list_courses.php');

    exit;
} else {
    echo "The form has not been submitted correctly.";
    exit;
}
