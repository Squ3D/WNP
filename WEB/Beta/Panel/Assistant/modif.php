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

if (isset($_POST['update'])) {
    // vérifier que tous les champs soient saisis
    $numFiche = $_POST['1'] ?? die("Num Fiche manquant");
    $adresse = $_POST['2'] ?? die("Adresse manquante");
    $date_visite = $_POST['3'] ?? die(" Date de visite manquante");
    $heure_visite = $_POST['4'] ?? die("Heure de visite manquante");
    $Matricule = $_POST['5'] ?? die("Numéro de matricule manquant");
    $code_Client = $_POST['6'] ?? die("Numéro client  manquant");
//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";die;

    $query = $conn->prepare(
        "UPDATE Intervention 
                    SET 
                    adresse = '$adresse', 
                    date_visite ='$date_visite',
                    heure_visite = '$heure_visite',
                    Num_Matricule = '$Matricule',
                    Code_Client = '$code_Client'
                    WHERE Numero_Fiche ='$numFiche'
                ");

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


<body background-color : blue>
<center><h1>Modification Intervention</h1></center>

<div id="box">
    <form name="watka" method="post">
        <label>Numéro</label>
        <input type="text" id="login" class="fadeIn second" name="1"
               placeholder="Renseigner le numéro de fiche" size="200"
               required value="<?php echo $_POST['1'] ?? die("Num Fiche manquant"); ?>">
        <br>
        <label>Adresse</label>
        <input type="text" id="addresse" class="fadeIn third" name="2"
               placeholder="adresse"
               required value="<?php echo $_POST['2'] ?? die("Addresse manquante"); ?>">
        <br>
        <label>Heures</label>
        <input type="text" id="heure_visite" class="fadeIn third" name="4" placeholder="Renseigner l'heure de visite"
               value="<?php echo $_POST['4'] ?? die("Heure visite manquante"); ?>"
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
               required value="<?php echo $_POST['3'] ?? die("Date de visite"); ?>">
        <br>

        <input name="update" method="post" type="submit" class="fadeIn fourth" values=" Valider">
        <a href="../../fpdf/testpdf.php"><input type="button" value="Exporter"></a>

    </form>


</div>
</body>



