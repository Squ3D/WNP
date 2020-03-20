<html>
<head>
    <link rel="stylesheet" href="tech.css"/>
</head>


<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("menutech.php"); ?>


</header>


<body>

<div class="container">
    <form id="contact" action="onverra.php" method="post">
        <h2><strong>Cloture de la fiche</strong></h2>
        <h4>Veuillez remplir les champs pour valider la fiche </h4>
        <fieldset>
            <label name="field1 "> <strong>Numéro fiche</strong> <?php echo $_GET['Numero_Fiche'] ?> </label>
        </fieldset>
        <fieldset>
            <label name="field2"> <strong>Date </strong> <?php echo $_GET['date_visite'] ?> </label>
        </fieldset>
        <fieldset>
            <label name="field3 "> <strong> Adresse</strong> <?php echo $_GET['adresse'] ?> </label>
        </fieldset>
        <fieldset>

            <label name="field4 "> <strong>Numéro client </strong> <?php echo $_GET['Code_Client'] ?> </label>
        </fieldset>
        <fieldset>
            <input type="numSerie" name="field5" placeholder="Numéro de série ex : 123 "/>
        </fieldset>
        <fieldset>
            <input type="temps" name="field5" placeholder=" Temps passé ex : 30 "/>
        </fieldset>
        <fieldset>
            <textarea placeholder="Votre commenaire ici" tabindex="5" required></textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Valider</button>

    </form>
</div>


</body>
<footer>

</footer>

</html>
	<?php include("footer.php");?>


</style>