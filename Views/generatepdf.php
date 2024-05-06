<?php
// Include the TCPDF library
require_once 'C:\Users\Mon Pc\tcpdf\tcpdf.php';

// Retrieve the data passed from the table
$id = $_GET['id'];
$nom = $_GET['nom'];
$description = $_GET['description'];
$prix = $_GET['prix'];
$date_debut = $_GET['date_debut'];
$date_fin = $_GET['date_fin'];
$localisation = $_GET['localisation'];
$type_id=$_GET['type_id'];



// Create a new TCPDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('orffer PDF');
$pdf->SetSubject('orffer Details');
$pdf->SetKeywords('TCPDF, PDF, orffer, details');

// Set default header data
$pdf->SetHeaderData('../View/img/logo.png', PDF_HEADER_LOGO_WIDTH, 'PDF BY manar', 'orffer deatails');

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont('helvetica', '', 12);

// Add a page
$pdf->AddPage();

// Add facture details to the PDF
$html = <<<EOD
<table border="1">
<tr><th> id</th><td>$id</td></tr>
<tr><th> nom</th><td>$nom</td></tr>
<tr><th> prix</th><td>$prix</td></tr>
<tr><th> date_debut</th><td>$date_debut</td></tr>
<tr><th> date_fin</th><td>$date_fin</td></tr>
<tr><th> localisation</th><td>$localisation</td></tr>
<tr><th> type_id</th><td>$type_id</td></tr>
</table>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('offre.pdf', 'D');
?>
