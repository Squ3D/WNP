<?php
session_start();
require_once "../../config.php";
?>

<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("menu.php"); ?>


</header>

<style>

    body{
        background-color:#e6f1f9;
    }
    table {
        border-collapse: collapse;
        width: 50%;
        margin-left: 23%;
        margin-top: 5%;
        font-family: sans-serif;
    }

    th, td {
        text-align: left;
        padding: 8px;
        color: black;;
    }

    tr:nth-child(even) {
        background-color: #dbe1e5;


    }

    th {
        background-color: #88b2d1;
        opacity: 0.7;
        color: white;
    }

</style>
<body>


<div id="stat">


    <?php
    $query = $_GET['queryFiche'];
    // gets value sent over search form
    $sqlu = $conn->query("SELECT * FROM Intervention
            WHERE Num_Matricule =" . $_GET['queryFiche']);
    while ($donnees = $sqlu->fetch()) {
        // on affiche toutes les infos de l'intervention de la fiche
        echo "<table class=\"responstable\">";
        echo "<tr><form method='post' action='modif.php'>";

        echo "<td>Numero fiche :$donnees[Numero_Fiche]<input type='hidden' name='1' value='$donnees[Numero_Fiche]'></td>";
        echo "<td>Adresse :$donnees[adresse]<input type='hidden' name='2' value='$donnees[adresse]'></td>";
        echo "<td>Date visite :$donnees[date_visite]<input type='hidden' name='3' value='$donnees[date_visite]'></td>";
        echo "<td>Heure visite :$donnees[heure_visite]<input type='hidden' name='4' value='$donnees[heure_visite]'> </td>";
        echo "<td>Numero technicien :$donnees[Num_Matricule]<input type='hidden' name='5' value='$donnees[Num_Matricule]'> </td>";
        echo "<td>Numero client :$donnees[Code_Client]<input type='hidden' name='6' value='$donnees[Code_Client]'> </td>";


        echo "<td><input type=\"submit\" value=\"Modifier la fiche\" /></td>";
        echo " </form></tr>";
        echo "</table>";


    }
    $sqlu->closeCursor();


    ?>


</div>


</body>
</div>
<footer>

</footer>

</html>