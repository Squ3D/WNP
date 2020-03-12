<?php
session_start();
require_once "config.php";

$numFiche = $_POST['1'];
$adresse = $_POST['1'];


if (isset($_POST['wata'])) {

    $query = $conn->prepare("INSERT INTO Intervention (Numero_Fiche, adresse)
      VALUES ('$numFiche','$adresse'");
    $query->execute();
    echo "c passé";

}


?>
<head>


</head>

<header>

    <?php include("menu.php"); ?>
</header>

<body background-color : blue>
<center><h1>Création Intervention</h1></center>

<div id="box">
    <form name="walta" method="post">


        <p>Numéro <input type="text" id="login" class="fadeIn second" name="1"
                         placeholder="Renseigner le numéro de fiche" size="200"></p>
        <p>Adresse <input type="text" id="password" class="fadeIn third" name="2" placeholder="adresse"></p>
        <p>Heures <input type="text" id="password" class="fadeIn third" name="4"
                         placeholder="Renseigner l'heure de visite"></p>
        <p>Matric <input type="text" id="login" class="fadeIn second" name="5"
                         placeholder="Renseigner Numéro de Matricule"></p>
        <p>Cclient <input type="text" id="password" class="fadeIn third" name="6"
                          placeholder="Renseigner le code Client"></p>
        <p><input type="text" id="login" class="fadeIn second" name="3" placeholder="Renseigner la date de visite"></p>


        <input name="wata" method="post" type="submit" class="fadeIn fourth"></a>
        </p>
    </form>


</div>
</body>
      
      
      
      