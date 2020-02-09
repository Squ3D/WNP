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
        margin top: 60px;
        background-color: white;
        opacity: 0.8;
        color: black;


    #stat
    {
        margin left: auto;
        margin right: auto;
        margin top: 60px;
    }
</style>
<html>
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
        <li><a href="https://www.naimo.me/CASHCASH/logout.php" value="deco">Déconnexion</a></li>
    </ul>

<?php

    try {
    $reponse = $conn->query('SELECT Numero_Fiche, adresse, date_visite, heure_visite, Code_Client
    FROM Intervention
    WHERE date_visite = CURDATE() AND  Num_Matricule =3');


    $reponse->setFetchMode(PDO::FETCH_ASSOC);
    $intervention = $reponse->fetchAll();

    echo ' <div id="box"> <table border="1px">';

            // On créé les entêtes correspondantes aux colonnes
            // pour le nombre d'intervention, la durée totale des intervention et le mois sélectionné

            echo "<th> Numero de fiche </th>";
            echo "<th> Adresse</th>";
            echo "<th> Date</th>";
            echo "<th> Heure</th>";
            echo "<th> Nom client </th>";


            // Pour chaque intervention
            foreach ($intervention as $intervention) {
            // On passe à la prochaine ligne du tableau
            echo "<tr>";
                // Pour chaque données des intervention
                foreach ($intervention as $valeurDelaColonne) {
                // On affiche la valeur de la colonne
                echo "<td>$valeurDelaColonne</td>";
                }
                echo "</tr>";
            }


            echo "</table></div></div>";


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

