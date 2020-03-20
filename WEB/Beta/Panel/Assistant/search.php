<html>

<?php
session_start();
require_once "../../config.php";
?>

<head>
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
    <link rel="stylesheet" href="/opt/lampp/htdocs/WNP/WEB/CSS/tab.css"/>
</head>
<body>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("menu.php"); ?>
</header>

<div id="stat">
    <table class="table">
        <thead class="thead-dark">
        <th>Numero Fiche</th>
        <th>Adresse</th>
        <th>Date Echeance</th>
        <th>Date Renouvellement</th>
        <th>Code Client</th>
        <th>Type Contrat</th>
        <th>Modifi de la fiche</th>
    <?php

    $query = $_POST['queryClient'] ?? null;
    // gets value sent over search form

    // naim j'ai modifié le sql pour avoir les fiches client et pas les infos
    if ($query) {
        $sql = "SELECT * FROM Intervention WHERE `Code_Client` = " . $query;
        $sqlu = $conn->query($sql);

        while ($donnees = $sqlu->fetch()) {
            echo "<tr><form method='post' action='modif.php'>";
            echo "<td>$donnees[Numero_Fiche]<input type='hidden' name='1' value='$donnees[Numero_Fiche]'></td>";
            echo "<td>$donnees[adresse]<input type='hidden' name='2' value='$donnees[adresse]'></td>";
            echo "<td>$donnees[date_visite]<input type='hidden' name='3' value='$donnees[date_visite]'></td>";
            echo "<td>$donnees[heure_visite]<input type='hidden' name='4' value='$donnees[heure_visite]'> </td>";
            echo "<td>$donnees[Num_Matricule]<input type='hidden' name='5' value='$donnees[Num_Matricule]'> </td>";
            echo "<td>$donnees[Code_Client]<input type='hidden' name='6' value='$donnees[Code_Client]'> </td>";
            echo "<td><input type=\"submit\" value=\"Modifier la fiche\" /></td>";
            echo " </form></tr>";
         
        }
        $sqlu->closeCursor();
           echo "</table>";
    }
    ?>

</div>
</body>
	<?php include("footer.php");?>

</html>