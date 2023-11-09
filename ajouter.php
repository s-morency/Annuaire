<?php
require_once('connexion_db.php');

$enregistrement_reussi = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enregistrer'])) {
  $id = $_POST['ajouter'];
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $telephone = $_POST["telephone"];
  $adresse = $_POST["adresse"];
  $code_postal = $_POST["code_postal"];
  $ville = $_POST["ville"];
  $province = $_POST["province"];

  if (!empty($nom) && !empty($prenom) && !empty($telephone)) {

    $sql = "INSERT INTO personne (prenom, nom, telephone, adresse, code_postal, ville, province)
            VALUES ('$prenom', '$nom', '$telephone', '$adresse', '$code_postal', '$ville', '$province');";
    $resultat = $conn->query($sql);
    if ($resultat) {
      $enregistrement_reussi = true;
    $conn->close();
  }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Annuaire</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <?php if ($enregistrement_reussi) : ?>
    <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body">
            Enregistrement effectué avec succès !
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php require_once('./header.php'); ?>
<div id="main">
<div class=rectangle>
  <h1>Ajouter un contact</h1>

  <form class="form-ajouter" action="ajouter.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= isset($nom) ? $nom : ''; ?>" required><br><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?= isset($prenom) ? $prenom : '' ?>" required><br><br>

    <label for="telephone">Numéro de téléphone :</label>
    <input type="telephone" id="telephone" name="telephone" value="<?= isset($telephone) ? $telephone : '' ?>" required><br><br>

    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse" value="<?= isset($adresse) ? $adresse : '' ?>"><br><br>

    <label for="code_postal">Code postal:</label>
    <input type="text" id="code_postal" name="code_postal" value="<?= isset($code_postal) ? $code_postal : '' ?>"><br><br>

    <label for="ville">Ville:</label>
    <input type="text" id="ville" name="ville" value="<?= isset($ville) ? $ville : '' ?>"><br><br>

    <label for="province">Province:</label>
    <input type="text" id="province" name="province" value="<?= isset($province) ? $province : '' ?>"><br><br>

    <input type="hidden" name="ajouter" value="1">

    <button name="enregistrer" type="submit">Enregistrer</button>
  </form>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<script>
  <?php if ($enregistrement_reussi) : ?>
    var modal = new bootstrap.Modal(document.getElementById('exampleModal'), {
      keyboard: false
    });
    modal.show();
  <?php endif; ?>
</script>
</html>