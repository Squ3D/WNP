<?php
session_start();
require_once "config.php";

//Utiliser l'extract $POST
$numFiche = $_POST['1'];
$adresse = $_POST['2'];
$date_visite = $_POST['3'];
$heure_visite = $_POST['4'];
$Matricule = $_POST['5'];
$code_Client = $_POST['6'];

if (isset($_POST['upload'])) {

    $query = $conn->prepare("INSERT INTO Intervention (Numero_Fiche, adresse, date_visite, heure_visite,Num_Matricule, Code_Client)
      VALUES ($numFiche, $adresse, $date_visite,$heure_visite,$Matricule,$code_Client)");
    $query->execute();
} else {
    echo 'fail during execution';
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
    }
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://www.naimo.me/CASHCASH/CSS/style.css" rel="stylesheet">

<ul>
    <li><a href="./client.php">Fiche Client</a></a></li>
    <li><a href="./intervention.php">Intervention</a></a></li>
    <li><a href="./statistique.php">Statistique</a></li>
    <li><a href="https://www.naimo.me/CASHCASH/logout.php" value="deco">Déconnexion</a></li>
</ul>


<body background-color : blue>
<center><h1>Création Intervention</h1></center>

<div id="box">
    <form name="watka" method="post">


        <p>Numéro <input type="text" id="login" class="fadeIn second" name="1"
                         placeholder="Renseigner le numéro de fiche" size="200"></p>
        <p>Adresse <input type="text" id="password" class="fadeIn third" name="2" placeholder="adresse"></p>
        <p>Heures <input type="text" id="password" class="fadeIn third" name="4"
                         placeholder="Renseigner l'heure de visite"></p>
        <p>Matric <input type="text" id="login" class="fadeIn second" name="5"
                         placeholder="Renseigner Numéro de Matricule"></p>
        <p>Cclient <input type="text" id="password" class="fadeIn third" name="6"
                          placeholder="Renseigner le code Client"></p>
        <p><input type="date" id="login" class="fadeIn second" name="3" placeholder="Renseigner la date de visite"></p>


        <input name="wata" method="post" type="submit" class="fadeIn fourth"></a>
        </p>
    </form>


</div>
</body>
      
      
      
      