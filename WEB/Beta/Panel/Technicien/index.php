<?php
session_start();
require_once "../../config.php";

if (empty($_SESSION)) {
    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
} //FOR TESTING PURPOSES ONLY !

else if (isset($_SESSION['Matricule'])) {

//    $nom = $_GET['Nom'];
//    $prenom = $_GET['Prenom'];
$temp = $_SESSION['Matricule'];


?>


<html>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("menutech.php"); ?>


</header>


<body>


    <?php

    try {
        $reponse = $conn->query('SELECT Numero_Fiche, Intervention.adresse, date_visite, heure_visite, Intervention.Code_Client, Raison, km
    FROM Intervention
    JOIN Client C on Intervention.Code_Client = C.Code_Client
    WHERE date_visite = CURDATE() AND  Num_Matricule =' . $temp . ' order by km');


        $reponse->setFetchMode(PDO::FETCH_ASSOC);
        $intervention = $reponse->fetchAll();


        echo ' <div class="table-responsive">';
        echo "<table class=\"table table-dark\" >";


        // On créé les entêtes correspondantes aux colonnes
        // pour le nombre d'intervention, la durée totale des intervention et le mois sélectionné

        echo "<th> Numero de fiche </th>";
        echo "<th> Adresse</th>";
        echo "<th> Date</th>";
        echo "<th> Heure</th>";
        echo "<th> Num client </th>";
        echo "<th> Nom client </th>";
        echo "<th> Km(s) </th>";
        echo "<th> Action(s) </th>";


        echo "<tr>";

        $query = "";

        // Pour chaque intervention
        foreach ($intervention as $intervention) {
            // On passe à la prochaine ligne du tableau
            echo "<tr>";
            // Pour chaque données des intervention
            foreach ($intervention as $key => $valeurDelaColonne) {
                // On affiche la valeur de la colonne
                echo "<td>$valeurDelaColonne</td>";
                $query .= $key . "=" . $valeurDelaColonne . "&";
            }
            $url = "valider.php?" . $query;
            echo "<td><a href='$url'> Valider la fiche </a> </td>";
        }


        echo "</tr>";
        echo "</table>";


        $reponse->closeCursor();
    } catch (Exception $exception) {
        die('Erreur : ' . $exception->getMessage());
    }
    } else {
        echo "Erreur lors de la recherche.";
    }
    ?>

</body>
<footer>

</footer>

</html>

