<?php


/*session_start();
if (session_destroy()) {
    header("Location: index.php");
    $pdo->closeCursor();
}

//Connection close*/


session_start();
session_destroy();
header('location:index.php');
exit;

