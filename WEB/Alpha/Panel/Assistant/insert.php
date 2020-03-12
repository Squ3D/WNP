<?php
session_start();
require_once "../../config.php";

//Utiliser l'extract $POST
$numFiche = $_POST['1'];
$adresse = $_POST['2'];
$date_visite = $_POST['3'];
$heure_visite = $_POST['4'];
$Matricule = $_POST['5'];
$code_Client = $_POST['6'];

if (isset($_POST['upload'])) {

    $query = $conn->prepare("INSERT INTO Intervention (Numero_Fiche, adresse, date_visite, heure_visite,Num_Matricule, Code_Client)
      VALUES ($numFiche, $adresse, $date_visite,$heure_visite,$Matricule,$code_Client)");
    $query->execute();
} else {
    echo 'fail during execution';
}
?>