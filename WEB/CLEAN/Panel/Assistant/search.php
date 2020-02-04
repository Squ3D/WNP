<?php
session_start();
require_once "../../config.php";
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
    }
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
        $query = $_GET['query'];
        // gets value sent over search form
        $sqlu = $conn->query("SELECT * FROM Client
            WHERE (`Code_Client` LIKE '%" . $query . "%') OR (`Code_Client` LIKE '%" . $query . "%')");
        while ($donnees = $sqlu->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "<table>";
            echo "</TR>";
            echo "<TH>Numero Client :", "$donnees[Code_Client] </TH>";
            echo "<TH>Raison :", "$donnees[Raison] </TH>";
            echo "<TH>Siren", "$donnees[Siren] </TH>";
            echo "<TH>Code APE:", "$donnees[Ape] </TH>";
            echo "<TH>Adresse :", " $donnees[Adresse] </TH>";
            echo "<TH>Numéro de Téléphone:", "$donnees[Num_tel] </TH>";
            echo "</TR>";
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