<?php
require('fpdf.php');
require('config.php');

$numi =
$sql = $conn->query("SELECT `adresse` FROM WNP.Intervention WHERE `Numero_Fiche`= 1");
$data = $sql->fetchColumn();

$sqla = $conn->query("SELECT `date_visite` FROM WNP.Intervention WHERE `Numero_Fiche`= 1");
$datb = $sqla->fetchColumn();

$sqlb = $conn->query("SELECT `heure_visite` FROM WNP.Intervention WHERE `Numero_Fiche` = 1");
$datc = $sqlb->fetchColumn();

$sqlc = $conn->query("SELECT DISTINCT nom FROM WNP.Intervention INNER JOIN employe on WNP.Intervention.Num_Matricule = employe.Num_Matricule");
$datd = $sqlc->fetchColumn();

$sqld = $conn->query("SELECT `Code_Client` FROM WNP.Intervention WHERE `Numero_Fiche`= 1");
$date = $sqld->fetchColumn();


$sqle = $conn->query("SELECT DISTINCT raison FROM WNP.Intervention INNER JOIN Client on WNP.Intervention.Code_Client = Client.Code_Client");
$datf = $sqle->fetchColumn();

/**
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Hello World !');
$pdf->Cell(2, 10, 'Date : ' . $data, 0, 1);
$pdf->Cell(2, 10, 'Date : ' . $datb, 0, 1);
$pdf->Cell(2, 10, 'Date : ' . $datc, 0, 1);
$pdf->Cell(2, 10, 'Date : ' . $datd, 0, 1);

$pdf->Output();
 *
 **/


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
//$pdf->Cell(0,10,'Numero Intervention : '.$numi,0,1);
$pdf->Cell(1,10,'Adresse : '.$data,0,1);
$pdf->Cell(2,10,'Date : '.$datb,0,1);
$pdf->Cell(3,10,'Duree intervention (heures) : '.$datc,0,1);
$pdf->Cell(4,10,'Nom du technicien en charge : '.$datd,0,1);
$pdf->Cell(5,10,'Code Client : '.$date,0,1);
$pdf->Cell(5,10,'Raison Client : '.$datf,0,1);
$pdf->Output();



