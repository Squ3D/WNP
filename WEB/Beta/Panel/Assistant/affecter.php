<?php
session_start();

require_once "../../config.php";

if (empty($_SESSION)) {
    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
} else if (isset($_SESSION['Matricule'])) {

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


<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php include("menu.php"); ?>
</header>


<body>


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
            <select id="myList">
                <?php
                $dati = $conn->query('SELECT * FROM Technicien');

                while ($donnees = $dati->fetch()) {
                    ?>
                    <option value=" <?php echo $donnees['Nom']; ?>"> <?php echo $donnees['Nom']; ?></option>
                    <?php
                }
                ?>


            </select>
            </p>


            </fieldset>

            <label>A visiter</label>
            <select id="myList">
                <?php
                $datop = $conn->query('SELECT * FROM Client');

                while ($donnees = $datop->fetch()) {
                    ?>
                    <option value=" <?php echo $donnees['Nom']; ?>"> <?php echo $donnees['Raison']; ?></option>
                    <?php
                }
                ?>

                <?php

                define("FPDF_FONTPATH", " Chemin_du_répertoire/font/");
                //lien vers le dossier " font "
                require("Chemin_du_répertoire/fpdf.php");
                //lien vers le fichier contenant la classe FPDF

                $pdf = new FPDF("P", "pt", "A4");
                //création d'une instance de classe, P pour portrait

                $pdf->Open(); //indique que l'on crée un fichier PDF
                $pdf->AddPage(); //permet d'ajouter une page
                $pdf->SetFont('Helvetica', 'B', 11); //choix de la police
                $pdf->SetXY(330, 25); // indique des coordonnées pour
                $pdf->Cell(190, 50, "texte dans le cadre", 0, 0, "L");
                $pdf->Text(498, 20, "texte"); //insertion d'une ligne
                $pdf->Output(); //génère le PDF et l'affiche

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
	<?php include("footer.php");?>

</html>

