<?php
session_start();

require_once "../../config.php";

if (empty($_SESSION)) {
    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
} 
    else if (isset($_SESSION['Matricule'])) {
        
        $nom = $_GET['Nom'];
        $prenom = $_GET['Prenom'];
        $temp = $_SESSION['Matricule'];

$sql = $conn->query("SELECT Prenom FROM employe WHERE Num_Matricule='$temp'");
$data = $sql->fetchColumn();

$sql1 = $conn->query("SELECT Nom FROM employe WHERE Num_Matricule='$temp'");
$dato = $sql1->fetchColumn();

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
        background-color: white;
        opacity: 0.8;
        color: black;
    }
</style>
<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    


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
                
                echo $data;
                echo " ";
                echo $dato;
                ?>
            </h1>
            
           
       
       <form name="watka" method="post">

             <label>Technicien Dispo</label>
             <select id = "myList">
             <?php
$dati = $conn->query('SELECT * FROM Technicien');
 
while ($donnees = $dati->fetch())
{
?>
           <option value=" <?php echo $donnees['Nom']; ?>"> <?php echo $donnees['Nom']; ?></option>
<?php
}
?>


             </select>
          </p>
          
          
       </fieldset>
    
    <label>A visiter</label>
               <select id = "myList">
             <?php
$datop = $conn->query('SELECT * FROM Client');
 
while ($donnees = $datop->fetch())
{
?>
           <option value=" <?php echo $donnees['Nom']; ?>"> <?php echo $donnees['Raison']; ?></option>
<?php
}
?>

<?php

define("FPDF_FONTPATH"," Chemin_du_répertoire/font/"); 
//lien vers le dossier " font " 
require("Chemin_du_répertoire/fpdf.php"); 
//lien vers le fichier contenant la classe FPDF

$pdf = new FPDF("P","pt","A4"); 
//création d'une instance de classe, P pour portrait

$pdf ->Open(); //indique que l'on crée un fichier PDF
$pdf ->AddPage(); //permet d'ajouter une page
$pdf ->SetFont('Helvetica','B',11); //choix de la police
$pdf ->SetXY(330, 25); // indique des coordonnées pour 
$pdf ->Cell(190,50,"texte dans le cadre",0,0, "L"); 
$pdf ->Text(498,20, "texte"); //insertion d'une ligne 
$pdf ->Output(); //génère le PDF et l'affiche	

?>


             </select>
        


     
        </p>
    </form>
       <input name="hachik" method="post" type="submit" class="fadeIn fourth">     
            </center>

        <p>
        
        </div>
    </div>

</body>
</div>
<footer>

</footer>

</html>

