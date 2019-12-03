

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="./CSS/style.css" rel="stylesheet">
<title>Login</title>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
    echo '<meta http-equiv="refresh" content="1;URL=./Panel/index.php">';
    
    echo"<p>";
    echo "<font color=green><strong>Connecté, Bienvenue vous allez être redirigé...</strong></font>";
    echo "</h3></p>";
    echo "Bienvenue Matricule : " . $Matricule;

    
    
    
}else {
    echo "<p>";
    echo "<font color=red>Non Connecté</font>";

    echo"</p>";
}
 

?>

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
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Mot de Passe">
      <input type="submit" class="fadeIn fourth" value="Connexion">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Mot de passe oublié ?</a>
    </div>

  </div>
</div>
