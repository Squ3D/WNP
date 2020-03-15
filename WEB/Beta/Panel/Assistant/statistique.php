<?php
session_start();
require_once "../../config.php";
?>


<html>

<head>

    <link rel="stylesheet" href="../../CSS/form.css"/>


</head>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("menu.php"); ?>


</header>




<body>


<form action="statistique2.php" method="post">

    <div class="container">
        <div class="head">
            <h2>Statistique</h2>
        </div>

        <input type="text" name="search" placeholder=" ex: Martin " required <br/>
        <div>

            <input type="date" id="date-min" name="date-min" required>


            <div>

                <input type="date" id="date-max" name="date-max" required>
            </div>


            <div class="message">Message Sent</div>
            <button id="submit" type="submit">
                Valider
            </button>
        </div>
</form>


</body>

<footer>

</footer>

</html>

