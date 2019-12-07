<?php

session_start();
  
  require_once "config.php";
  $Matricule = $_POST['Matricule'];
  $password = $_POST['password'];
 
$query = $conn->prepare("SELECT COUNT(*) FROM employe WHERE password ='$password' AND Num_Matricule ='$Matricule' ");

$query->execute();
$count = $query->fetchColumn();    
if ($count=="1"){
    $_SESSION['Matricule'] = $Matricule;
    $_Nom['Nom'] = $Nom;
    echo '<meta http-equiv="refresh" content="1;URL=./Panel/index.php">';
}else {
    if($count != "1") {
    echo "<p>";
    echo "<font color=red>Combinaison Matricule/Mots de passe incorrect</font>";

    echo"</p>";
    }
}
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="./CSS/style.css" rel="stylesheet">
<title>Login</title>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="./logo.png" width="50px" height="60px" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="Matricule" placeholder="Matricule">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de Passe">
      <input type="submit" class="fadeIn fourth" value="Connexion">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Mot de passe oublié ?</a>
    </div>

  </div>
</div>