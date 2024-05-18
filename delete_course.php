<?php
require_once '../controller/formationC.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $formationController = new FormationC();
    $formationController->deleteFormation($_GET['id']);
    
    header('Location: ../view/list_courses.php');
    exit;
} else {
    echo "Invalid request.";
    exit;
}
