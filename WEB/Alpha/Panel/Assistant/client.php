<?php
session_start();
require_once "../../config.php";
require_once "../../@scripts/Affichage.php";

//Utiliser l'extract $POST

$sqlRequest = $conn->query("SELECT Num_Matricule FROM Technicien");
$sqlRequest->setFetchMode(PDO::FETCH_ASSOC);
$techniciens = $sqlRequest->fetchAll();

$sqlRequest = $conn->query("SELECT Code_Client FROM Client");
$sqlRequest->setFetchMode(PDO::FETCH_ASSOC);
$clients = $sqlRequest->fetchAll();

if (isset($_POST['create'])) {
    // vérifier que tous les champs soient saisis
    $numFiche = $_POST['1'] ?? die("Num Fiche manquant");
    $adresse = $_POST['2'] ?? die("Adresse manquante");
    $date_visite = $_POST['3'] ?? die(" Date de visite manquante");
    $heure_visite = $_POST['4'] ?? die("Heure de visite manquante");
    $Matricule = $_POST['5'] ?? die("Numéro de matricule manquant");
    $code_Client = $_POST['6'] ?? die("Numéro client  manquant");


    $query = $conn->prepare("INSERT INTO Intervention(Numero_Fiche, adresse, date_visite, heure_visite,Num_Matricule, Code_Client)
      VALUES ('$numFiche', '$adresse', '$date_visite','$heure_visite',$Matricule,$code_Client)");

    if ($query->execute()) {
        echo "<script>alert(\"Informations enregistrées\")</script>";
    } else {
        echo "Erreur lors de la création d'une intervention";
    }
}
?>

<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    /* Change the link color to #111 (black) on hover */
    li a:hover {
        background-color: #111;
    }

    #box {
        text-align: center;
        margin left: auto;
        margin right: auto;
    }
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://www.naimo.me/CASHCASH/CSS/style.css" rel="stylesheet">

<ul>
    <li><a href="./client.php">Fiche Client</a></a></li>
    <li><a href="./intervention.php">Intervention</a></a></li>
    <li><a href="./statistique.php">Statistique</a></li>
    <li><a href="kicked.php" value="deco">Déconnexion</a></li>
</ul>


<body background-color : blue>
<p><font color="transparent">&nbsp</font></p>
<p><font color="transparent">&nbsp</font></p>
<center><h1 class="hab"><font color="black">Création Intervention</font></h1></center>

<div id="box">
    <form name="watka" method="post">
        <label>Numéro</label>
        <input type="text" id="login" class="fadeIn second" name="1"
               placeholder="Renseigner le numéro de fiche" size="200"
               required>
        <br>
        <label>Adresse</label>
        <input type="text" id="password" class="fadeIn third" name="2" placeholder="adresse" required>
        <br>
        <label>Heures</label>
        <input type="text" id="password" class="fadeIn third" name="4" placeholder="Renseigner l'heure de visite"
               required>
        <br>
        <label>Matric</label>
        <?php
        // Pour chaque techniciens
        //            foreach ($techniciens as $technicien) {
        //                // Pour chaque données du technicien
        //                foreach ($technicien as $valeurDelaColonne) {
        //                    // On affiche la valeur de la colonne
        //                    echo "<option value=\"$valeurDelaColonne\">$valeurDelaColonne</option>";
        //                }
        //            }

        Affichage::afficherCleEtrangeres($techniciens, "5");
        ?>

        <br>

        <label>Cclient</label>
        <?php
        //            foreach ($clients as $client) {
        //                foreach ($client as $valeurDelaColonne) {
        //                    echo "<option value=\"$valeurDelaColonne\">$valeurDelaColonne</option>";
        //                }
        //            }

        Affichage::afficherCleEtrangeres($clients, "6");
        ?>
        <br>
        <label>Date</label>
        <input type="date" id="login" class="fadeIn second" name="3" placeholder="Renseigner la date de visite"
               required>
        <br>

        <input name="create" method="post" type="submit" class="fadeIn fourth">

    </form>


</div>
</body>
      
      
      
      