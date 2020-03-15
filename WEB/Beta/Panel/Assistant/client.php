<html>

<head>

    <link rel="stylesheet" href="../../CSS/form.css"/>
</head>
</html>
<?php
session_start();
require_once "../../config.php";
require_once "../../@scripts/Affichage.php";

//Utiliser l'extract $POST


$sqlRequest = $conn->query("SELECT idAgence FROM Assistant_Telephonique WHERE Num_Matricule = " . $_SESSION['Matricule']);
$sqlRequest->setFetchMode(PDO::FETCH_ASSOC);
$idAgence = $sqlRequest->fetchAll();

$sqlRequest = $conn->query("SELECT Num_Matricule FROM Technicien WHERE IdAgence = " . $idAgence[0]["idAgence"]);

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
    $km = $_POST['7'] ?? die (" Distance manquante");


    $query = $conn->prepare("INSERT INTO Intervention(Numero_Fiche, adresse, date_visite, heure_visite,Num_Matricule, Code_Client, km)
      VALUES ('$numFiche', '$adresse', '$date_visite','$heure_visite',$Matricule,$code_Client, $km)");

    if ($query->execute()) {
        echo "<script>alert(\"Informations enregistrées\")</script>";
    } else {
        echo "Erreur lors de la création d'une intervention";
    }
}
?>


<header>

    <?php include("menu.php"); ?>

</header>
<div class="container">
    <div class="head">
        <h2>Intervention</h2>
    </div>


    <div id="box">
        <form name="watka" method="post">

            <input type="text" id="login" class="fadeIn second" name="1"
                   placeholder="Renseigner le numéro de fiche" size="200"
                   required>
            <br>

            <input type="text" id="password" class="fadeIn third" name="2" placeholder="adresse" required>
            <br>

            <input type="text" id="password" class="fadeIn third" name="4" placeholder="Renseigner l'heure de visite"
                   required>
            <br>

            <div class="affichage">
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
                ?>  </div>


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

            <input type="date" id="login" class="fadeIn second" name="3" placeholder="Renseigner la date de visite"
                   required>
            <br>

            <input type="text" id="password" class="fadeIn third" name="7"
                   placeholder="Renseigner la distance depuis l'agence"
                   required>
            <br>


            <div class="message">Message Sent</div>
            <button id="submit" name=create type="submit">
                Valider
            </button>
        </form>


    </div>
</div>

      
      
      