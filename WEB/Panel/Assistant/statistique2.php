<?php

require_once "../../config.php";
session_start();

if (
    isset ($_POST["search"])
    && isset ($_POST["date-min"])
    && isset ($_POST["date-max"])
) {
    $nomDuTechnicien = $_POST["search"];
    $dateVisiteMin = $_POST["date-min"];
    $dateVisiteMax = $_POST["date-max"];

    try {
        $sqlRequest = $conn->query("
            SELECT Nom, Prenom, date_visite  FROM Technicien 
            LEFT JOIN Intervention I 
            ON Technicien.Num_Matricule = I.Num_Matricule 
            WHERE Nom LIKE  '%" . $nomDuTechnicien . "%' 
            AND date_visite >= '" . $dateVisiteMin . "'
            AND date_visite <= '" . $dateVisiteMax . "'
        ");

        $sqlRequest->setFetchMode(PDO::FETCH_ASSOC);
        $techniciens = $sqlRequest->fetchAll();

        if (empty($techniciens)) {
            die ("Aucun résultat.");
        }

        echo ' <div id="box"> <table border="1px">';

        // On créé les entêtes correspondantes aux colonnes
        // exemple : Nom, Prenom, date_visite
        foreach ($techniciens[0] as $NomDeLaColonne => $valeurDelaColonne) {
            echo "<th>$NomDeLaColonne</th>";
        }

        // Pour chaque techniciens
        foreach ($techniciens as $technicien) {
            // On passe à la prochaine ligne du tableau
            echo "<tr>";
            // Pour chaque données du technicien
            foreach ($technicien as $valeurDelaColonne) {
                // On affiche la valeur de la colonne
                echo "<td>$valeurDelaColonne</td>";
            }
            echo "</tr>";
        }

        echo "</table></div></div>";

        $sqlRequest->closeCursor();
    } catch (Exception $exception) {
        die('Erreur : ' . $exception->getMessage());
    }
} else {
    echo "Erreur lors de la recherche.";
}
