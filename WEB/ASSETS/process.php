<?php
session_start();
   require_once "config.php";
  $nom = $conn->prepare("SELECT Nom FROM employe WHERE Num_Matricule='$Matricule'"); 
$data = $nom->fetchColumn(); 
echo $nom;
?>