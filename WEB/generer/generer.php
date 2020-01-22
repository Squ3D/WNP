<?php
require('fpdf.php');
require('config.php');

$numi = 1;

$sql = $conn->query("SELECT `adresse` FROM intervention WHERE `Numero_Fiche`= $numi");
$data = $sql->fetchColumn();

$sqla = $conn->query("SELECT `date_visite` FROM intervention WHERE `Numero_Fiche`= $numi");
$datb = $sqla->fetchColumn();

$sqlb = $conn->query("SELECT `heure_visite` FROM intervention WHERE `Numero_Fiche` = $numi");
$datc = $sqlb->fetchColumn();

$sqlc = $conn->query("SELECT DISTINCT nom FROM intervention INNER JOIN employe on intervention.Num_Matricule = employe.Num_Matricule");
$datd = $sqlc->fetchColumn();

$sqld = $conn->query("SELECT `Code_Client` FROM intervention WHERE `Numero_Fiche`= $numi");
$date = $sqld->fetchColumn();



class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Cell(58,10,'Rapport Intervention ',1,0,'C');
    // Saut de ligne
    $this->Ln(45);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Numero Intervention : '.$numi,0,1);
$pdf->Cell(1,10,'Adresse : '.$data,0,1);
$pdf->Cell(2,10,'Date : '.$datb,0,1);
$pdf->Cell(3,10,'Duree intervention (heures) : '.$datc,0,1);
$pdf->Cell(4,10,'Nom du technicien en charge : '.$datd,0,1);
$pdf->Cell(4,10,'Code Client : '.$date,0,1);
$pdf->Output();
?>