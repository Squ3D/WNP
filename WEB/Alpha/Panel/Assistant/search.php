<?php
session_start();
require_once "../../config.php";

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
         