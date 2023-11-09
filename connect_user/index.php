<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
  $user['type'] = $_SESSION['type'];
  // vérifier si l'utilisateur est un administrateur ou un utilisateur
  if ($user['type'] == 'admin') {
    header("Location: home.php");    
  }
 
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
  <?php require_once('../header.php');?>
  <div id="main">
    <div class="rectangle">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p>C'est votre espace utilisateur.</p>
    <button onclick="window.location.href = '../index.php'">Page d'accueil</button>
    <button onclick="window.location.href = 'logout.php'">Déconnexion</button>
<!--     <p>Cliquez <a href=../index.php>ici pour voir les contacts.</a></p>
    <a href="logout.php">Déconnexion</a> -->
    </div>
  </div>
  </body>
</html>
