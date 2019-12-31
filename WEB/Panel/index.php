<?php
session_start();
require_once "../config.php";

if (empty($_SESSION)) {
    //Redirige si tentative de Scan ou accées au fichiers
    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
} //Certain morceau de code sont là à des fins de test uniquement, ne pas  les supprimer svp.

elseif (isset($_SESSION['Matricule'])) {

//    $nom = $_GET['Nom'];
//    $prenom = $_GET['Prenom'];
    $temp = $_SESSION['Matricule'];

    $sql = $conn->query("SELECT role FROM employe WHERE Num_Matricule='$temp'");
    $data = $sql->fetchColumn();

//Si le role vaut 0 alors on redirige sur le répertoire Technicien
    if (0 == $data) {
        echo "on fait un test les kheys";
        echo "$data";
        echo '<meta http-equiv="refresh" content="0;URL=./Technicien/">';

    }

//Si le role vaut 1 alors on va chez les Assistanrs.
    if (1 == $data) {
        echo '<meta http-equiv="refresh" content="0;URL=./Assistant/">';

        //Assistant

    }

    $sql1 = $conn->query("SELECT Nom FROM employe WHERE Num_Matricule='$temp'");
    $dato = $sql1->fetchColumn();

    try {
        $sqlu = $conn->query("SELECT * FROM `Contrat_Maintenance`");
        while ($donnees = $sqlu->fetch()) {
            echo "test success";


        }
        $sqlu->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://naimo.me/CASHCASH/CSS/style.css" rel="stylesheet">
<title>Login</title>
