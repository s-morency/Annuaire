<?php
require_once('connexion_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])){
  $id = $_POST['supprimer'];
  $sql = "DELETE FROM personne WHERE id=" . $id;
  $resultat = $conn->query($sql);
  header("Location: liste.php");
}
$conn->close();
?>