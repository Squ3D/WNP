<?php
session_start();
require_once "../../config.php";
?>

<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php include("menu.php"); ?>

</header>


<body>


    <div id="stat">


        <?php
        $query = $_GET['queryDate'];
        // 2020-02-01 => "2020-02-01"
        $date = '"' . $_GET['queryDate'] . '"';
        $sqlu = $conn->query('SELECT * FROM Intervention WHERE date_visite LIKE' . $date);

        while ($donnees = $sqlu->fetch()) {
            // on affiche toutes les infos de l'intervention de la date passée dans le get
            /* echo "<table>";
             echo "</TR>";
             echo "<TH>Numero fiche :", "$donnees[Numero_Fiche] </TH>";
             echo "<TH>Adresse :", "$donnees[adresse] </TH>";
             echo "<TH>Date visite", "$donnees[date_visite] </TH>";
             echo "<TH>Heure visite:", "$donnees[heure_visite] </TH>";
             echo "<TH>Numéro technicien :", " $donnees[Num_Matricule] </TH>";
             echo "<TH>Numéro Client:", "$donnees[Code_Client] </TH>";
             echo "</TR>";
             echo "</table>";*/

            echo "<table class=\"responstable\">";
            echo "<tr><form method='post' action='modif.php'>";

            echo "<td>Numero fiche :$donnees[Numero_Fiche]<input type='hidden' name='1' value='$donnees[Numero_Fiche]'></td>";
            echo "<td>Adresse :$donnees[adresse]<input type='hidden' name='2' value='$donnees[adresse]'></td>";
            echo "<td>Date visite :$donnees[date_visite]<input type='hidden' name='3' value='$donnees[date_visite]'></td>";
            echo "<td>Heure visite :$donnees[heure_visite]<input type='hidden' name='4' value='$donnees[heure_visite]'> </td>";
            echo "<td>Numero technicien:$donnees[Num_Matricule]<input type='hidden' name='5' value='$donnees[Num_Matricule]'> </td>";
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