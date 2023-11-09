<?php
session_start();
 
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
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
    <p>C'est votre espace admin.</p><br>
    <button id="retourIndex" class="float-left submit-button" >Page d'accueil</button>
    <script type="text/javascript">
      document.getElementById("retourIndex").onclick = function () {
        location.href = "../index.php";
      };
    </script>
    <button id="boutonAjouter" class="float-left submit-button" >Ajouter un utilisateur</button>
    <script type="text/javascript">
      document.getElementById("boutonAjouter").onclick = function () {
        location.href = "add_user.php";
      };
    </script>
    <button id="boutonDeconnexion" class="float-left submit-button" >Déconnexion</button>
    <script type="text/javascript">
      document.getElementById("boutonDeconnexion").onclick = function () {
        location.href = "logout.php";
      };
    </script>
<!--     <p>Cliquez <a href=../index.php>ici pour voir les contacts.</a></p>
    <a href="add_user.php">Ajouter</a> | 
    <a href="logout.php">Déconnexion</a> -->
    </ul>
    </div>
    </div>
  </body>
</html>