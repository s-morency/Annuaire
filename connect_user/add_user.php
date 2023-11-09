<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Annuaire</title>
</head>
<body>
<?php require_once('../header.php');?>
<?php
require('../connexion_db.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  // récupérer le type (user | admin)
  $type = stripslashes($_REQUEST['type']);
  $type = mysqli_real_escape_string($conn, $type);
  
    $query = "INSERT into `utilisateur` (username, email, type, password)
          VALUES ('$username', '$email', '$type', '".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);

    if($res){
      ?>
        <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Utilisateur ajouter avec succès !
              </div>
              <div class="modal-footer">
                <button type="button" onclick="window.location.href = '/Langlois_Morency_Annuaire/connect_user/home.php'" class="btn btn-secondary" data-bs-dismiss="modal">Retour à votre espace admin</button>
              </div>
            </div>
          </div>
        </div>
    <?php  
    }
} else {
?>

<div id="main">
<div class="rectangle">
  <form class="box" action="" method="post">
    <h1 class="box-title">Ajouter utilisateur</h1>
    <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required /><br><br>
    <input type="text" class="box-input" name="email" placeholder="Email" required /><br><br>
    <select class="box-input" name="type" id="type" >
      <option value="" disabled selected>Type</option>
      <option value="admin">Admin</option>
      <option value="user">Utilisateur</option>
    </select><br><br>
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required /><br><br>
    
    <button type="submit">Ajouter</button>
  </form>
<?php } ?>
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