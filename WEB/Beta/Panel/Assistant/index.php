<?php
session_start();

require_once "../../config.php";

if (empty($_SESSION)) {
    echo '<meta http-equiv="refresh" content="0;URL=./kicked.php">';
}

?>
<style>

    body{
        background-color:#e6f1f9;
    }
    table {
        border-collapse: collapse;
        width: 50%;
        margin-left: 23%;
        margin-top: 5%;
        font-family: sans-serif;
    }

    th, td {
        text-align: left;
        padding: 8px;
        color: black;;
    }

    tr:nth-child(even) {
        background-color: #dbe1e5;


    }

    th {
        background-color: #88b2d1;
        opacity: 0.7;
        color: white;
    }

</style>

<head>

    <link rel="stylesheet" href="/opt/lampp/htdocs/WNP/WEB/CSS/tab.css"/>
</head>
<header>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include("menu.php"); ?>


</header>


<body>


<table class="table"
<thead class="thead-dark">
<th>Numero de contrat</th>
<th>Date Signature</th>
<th>Date Echeance</th>
<th>Date Renouve</th>
<th>Code Client</th>
<th>Type Contrat</th>
<?php


try {
    $sqlu = $conn->query("SELECT num_contrat, date_signature, date_eche,date_renouv, Raison, ref_contrat FROM contrat_maintenance
    inner join Client on contrat_maintenance.code_client = Client.Code_Client


WHERE contrat_maintenance.date_eche >= '2020-01-01' ");
    $data = $sqlu->fetchAll();

    // Pour chaque données on ajoute une ligne dans le tableau d'affichage
    foreach ($data as $datum) {
        echo "<tr>";
        echo "<td>$datum[num_contrat] </td>";
        echo "<td>$datum[date_signature] </td>";
        echo "<td>$datum[date_eche] </td>";
        echo "<td>$datum[date_renouv] </td>";
        echo "<td>$datum[Raison] </td>";
        echo "<td>$datum[ref_contrat] </td>";
        echo "</tr>";
    }

    $sqlu->closeCursor();
} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
} ?>
</
>
</div>
</div>

</body>
</div>
    <?php include("footer.php");?>

</html>

