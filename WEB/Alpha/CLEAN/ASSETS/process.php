<?php
session_start();
require_once "config.php";
$nom = $conn->prepare("SELECT Nom FROM employe WHERE Num_Matricule='$matricule'");
$data = $nom->fetchColumn();
echo $nom;
?>