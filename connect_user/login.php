<?php 
session_start();
require_once('../header.php');
require('../connexion_db.php');

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  $query = "SELECT * FROM `utilisateur` WHERE username='$username' AND password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($conn,$query) or die("Connection failed: " . $conn->connect_error);

  ?> 
    <!DOCTYPE html>
      <html>
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Annuaire</title>
        <link rel="stylesheet" href="/Langlois_Morency_Annuaire/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      </head>
      <body>
  <?php
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $username;
    $_SESSION['type'] = $user['type'];
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    if ($user['type'] == 'admin') {
      ?>
        <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Connexion réussi !
              </div>
              <div class="modal-footer">
                <button type="button" onclick="window.location.href = '/Langlois_Morency_Annuaire/connect_user/home.php'" class="btn btn-secondary" data-bs-dismiss="modal">Retour à votre espace admin</button>
              </div>
            </div>
          </div>
        </div>
    <?php  
    }else{
      ?>
        <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Connexion réussi !
              </div>
              <div class="modal-footer">
                <button type="button" onclick="window.location.href = '/Langlois_Morency_Annuaire/connect_user/index.php'" class="btn btn-secondary" data-bs-dismiss="modal">Retour à votre espace membre</button>
              </div>
            </div>
          </div>
        </div>
    <?php  
    }
  } else {
    ?>
    <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Nom d'utilisateur ou mot de passe incorrect.
          </div>
          <div class="modal-footer">
            <button type="button" onclick="window.location.href = '/Langlois_Morency_Annuaire/connect_user/login.php'" class="btn btn-secondary" data-bs-dismiss="modal">Retour</button>
          </div>
        </div>
      </div>
    </div>
<?php  
  }
}
?>
<div id="main">
  <div class="rectangle">
    <h1 class="box-title">Connexion</h1>
    <form class="box" action="" method="post" name="login">
    <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur"><br><br>
    <input type="password" class="box-input" name="password" placeholder="Mot de passe"><br><br>
    <button type="submit">Connexion</button>
    </form>
    <p class="box-register">Vous êtes nouveau ici? 
    <button onclick="window.location.href = 'register.php'">S'inscrire</button>
    </p>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<script>
    var modal = new bootstrap.Modal(document.getElementById('exampleModal'), {
      keyboard: false
    });
    modal.show();
</script>
</html>