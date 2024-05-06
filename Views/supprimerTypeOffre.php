<?php
include '../Controller/TypeOffreC.php';
$typeOffreC = new TypeOffreC();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $typeOffreC->supprimerTypeOffre($id);
}

header("Location: try2.php");
?>
