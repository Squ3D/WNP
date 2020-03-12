<?php
session_start();

require_once "config.php";
$Matricule = $_POST['Matricule'];
$password = $_POST['password'];
$query = $conn->prepare("SELECT COUNT(*) FROM employe WHERE password ='$password' AND Num_Matricule ='$Matricule' ");

$query->execute();
$count = $query->fetchColumn();
if ($count == "1") {
    $_SESSION['Matricule'] = $Matricule;
    echo '<meta http-equiv="refresh" content="1;URL=./Panel/index.php">';
} else {
    if ($count != "1") {
        echo "<p>";
        echo "<font color=red>Combinaison Matricule/Mots de passe incorrect</font>";

        echo "</p>";
    }
}
?>