<?php
require_once "../../config.php";
session_start();
?>


<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php include("menu.php"); ?>
</header>





<body>


<div id="stat">


    <?php

    if (
        isset ($_POST["search"])
        && isset ($_POST["date-min"])
        && isset ($_POST["date-max"])
    ) {
        $nomDuTechnicien = $_POST["search"];
        $dateVisiteMin = $_POST["date-min"];
        $dateVisiteMax = $_POST["date-max"];

        try {
            $request = "
            
            SELECT COUNT(controller.intervention), SUM(controller.temps_passe), MONTH(date_visite),TM.Libelle, SUM(I.km)
            FROM controller
            JOIN Intervention I on controller.intervention = I.Numero_Fiche
             JOIN employe e on I.Num_Matricule = e.Num_Matricule
            JOIN Materiel M on controller.materiel = M.NumSerie
            JOIN TypeMateriel TM on M.Ref = TM.Ref



              
            

            WHERE e.Nom LIKE '%" . $nomDuTechnicien . "%'
            AND date_visite >= '" . $dateVisiteMin . "'
            AND date_visite <= '" . $dateVisiteMax . "'
";

            $sqlRequest = $conn->query($request);
            $sqlRequest->setFetchMode(PDO::FETCH_ASSOC);
            $techniciens = $sqlRequest->fetchAll();

            if (empty($techniciens)) {

                die ("Aucun résultat.");
            }

            echo ' <table class="responstable">';

            // On créé les entêtes correspondantes aux colonnes
            // pour le nombre d'intervention, la durée totale des intervention et le mois sélectionné

            echo "<th> Nombre d'interventions </th>";
            echo "<th> Durée totale des interventions</th>";
            echo "<th> Mois des interventions</th>";
            echo "<th> Matériel</th>";
            echo "<th> KM parcourus </th>";


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
    ?>

</div>

</body>
</div>
<footer>

</footer>

</html>
