<html>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("menutech.php"); ?>

    <link rel="stylesheet" href="tech.css"/>



</header>


<body>

<div class="container">
    <form id="contact" action="onverra.php" method="post">
        <h3> <strong>Cloture de la fiche</strong> </h3>
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
            <label name="field4 "> <strong>Numéro client </strong> <?php echo $_GET['date_visite'] ?> </label>
        </fieldset>
        <fieldset>
            <label> <strong> Temps passé </strong> </label> <input type="temps" name="field5" placeholder="ex : 30 "/>
        </fieldset>
        <fieldset>
            <textarea placeholder="Votre commenaire ici" tabindex="5" required></textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Valider </button>

    </form>
</div>




</body>
<footer>

</footer>

</html>


</style>