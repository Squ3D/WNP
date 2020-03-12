<style>
  table {
border: medium solid #6495ed;
border-collapse: collapse;
width:50%;
display:inline-block;
}
th {
font-family: monospace;
border: thin solid #6495ed;
width: 50%;
padding: 5px;
background-color: #D0E3FA;

}
td {
font-family: sans-serif;
border: thin solid #6495ed;
width: 50%;
padding: 5px;
text-align: center;
background-color: #ffffff;

}
caption {
font-family: sans-serif;
}</style>

<?php
session_start();

require_once "../../config.php";

if (empty($_SESSION)) {
    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
} //FOR TESTING PURPOSES ONLY !

elseif (
    isset($_GET['Nom'])
    && isset($_GET['Prenom'])
    && isset($_SESSION['Matricule'])
) {

    $nom = $_GET['Nom'];
    $prenom = $_GET['Prenom'];
    $temp = $_SESSION['Matricule'];

    $nomRequest = $conn->query("SELECT Nom FROM employe WHERE Num_Matricule='$temp'");
    $prenomRequest = $conn->query("SELECT Prenom FROM employe WHERE Num_Matricule='$temp'");

    $noms = $nomRequest->fetchColumn();
    $prenoms = $prenomRequest->fetchColumn();

    try {
        $sqlu = $conn->query("SELECT * FROM `Contrat_Maintenance`");
        while ($donnees = $sqlu->fetch()) {
            echo "test success";


        }
        $sqlu->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
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
        background-color: transparent;
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
        <li><a href="https://www.naimo.me/CASHCASH/logout.php" value="deco">Déconnexion</a></li>
    </ul>


    <div id="welcome">
        <center>
            <h1>Bienvenue sur la page d'administration
                <?php
                if (isset($prenoms)) echo $prenoms;
                if (isset($noms)) echo $noms;
                ?>
            </h1></center>

        <p>
        <h2>Vous trouvrez les échéances des contrats sur cette page</h2></p>


        <div id="box">
            <table border="1px">
                <th>Numero de contrat</th>
                <th>Date Signature</th>
                <th>Date Echeance</th>
                <th>Date Renouve</th>
                <th>Code Client</th>
                <th>Type Contrat</th>
                <?php

                try {
                    $sqlu = $conn->query("SELECT * FROM `Contrat_Maintenance`");

                    while ($donnees = $sqlu->fetch()) {
                        // Pour chaque données on ajoute une ligne dans le tableau d'affichage

                        echo "<tr>";
                        echo "<td>$donnees[NumerodeContrat] </td>";
                        echo "<td>$donnees[dateSignature] </td>";
                        echo "<td>$donnees[dateEcheance] </td>";
                        echo "<td>$donnees[Date_Renouvellement] </td>";
                        echo "<td>$donnees[Code_Client] </td>";
                        echo "<td>$donnees[RefTypeContrat] </td>";
                        echo "</tr>";
                    }

                    $sqlu->closeCursor();
                } catch (Exception $exception) {
                    die('Erreur : ' . $exception->getMessage());
                } ?>
            </table>
        </div>
    </div>

</body>
</div>
<footer>

</footer>

</html>

