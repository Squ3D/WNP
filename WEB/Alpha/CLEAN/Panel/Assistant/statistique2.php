<?php
require_once "../../config.php";
session_start();
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
/*
    #box {
        text-align: center;
        margin left: auto;
        margin right: auto;
        margin top: 60px;

        opacity: 0.8;
        color: black;
    }*/
</style>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://www.naimo.me/CASHCASH/CSS/style.css" rel="stylesheet">
</header>


<body>
<div id="navbar">
    <ul>
        <li><a href="./client.php">Fiche Client</a></a></li>
        <li><a href="./intervention.php">Intervention</a></a></li>
        <li><a href="./statistique.php">Statistique</a></li>
        <li><a href="./recherche.php">Recherche</a></li>
        <li><a href="./logout.php" value="deco">Déconnexion</a></li>
    </ul>


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
        $sqlRequest = $conn->query("
            
            SELECT COUNT(Controller.Numero_Fiche), SUM(Controller.temps_passe), MONTH(date_visite)
            FROM Controller
            JOIN Intervention I on Controller.Numero_Fiche = I.Numero_Fiche
            JOIN employe e on I.Num_Matricule = e.Num_Matricule
            WHERE e.Nom LIKE '%" . $nomDuTechnicien . "%'
            AND date_visite >= '" . $dateVisiteMin . "'
            AND date_visite <= '" . $dateVisiteMax . "'
");

        $sqlRequest->setFetchMode(PDO::FETCH_ASSOC);
        $techniciens = $sqlRequest->fetchAll();

        if (empty($techniciens)) {
            -
            die ("Aucun résultat.");
        }

        echo ' <div id="box"> <table border="1px">';

        // On créé les entêtes correspondantes aux colonnes
        // pour le nombre d'intervention, la durée totale des intervention et le mois sélectionné

        echo "<th> Nombre d'interventions </th>";
        echo "<th> Durée totale des interventions</th>";
        echo "<th> Mois des interventions</th>";


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
