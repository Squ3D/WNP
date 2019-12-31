<?php
session_start();
require_once "config.php";

$query = $conn->prepare("SELECT Nom FROM `employe` where Num_Matricule='$matricule'");

$query->execute();

$nom = mysql_query($query);

echo '$nom';


?>