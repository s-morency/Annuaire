<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Gestionnaire d'annuaire</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php require_once('./header.php');?>
  <div id="main">
    <div>
      <h1>Gestionnaire d'annuaire</h1>
    
      <?php
      require_once('./connexion_db.php');

      (int)$page_courante = isset($_POST["changer_page"]) ? $_POST["changer_page"] : 1 ;
      $sql_count = "SELECT count(*) FROM personne";
      $sql = "SELECT * FROM personne LIMIT 10 OFFSET " . $page_courante * 10 - 10 ;
      $resultat_count = $conn->query($sql_count);
      $resultat = $conn->query($sql);
      $conn->close();
      $page_total = ceil($resultat_count->fetch_assoc()['count(*)'] / 10);
      if ($resultat->num_rows > 0) { 
        echo "<table>";
        echo "<tr><th>Nom</th>
              <th>Prénom</th>
              <th>Téléphone</th>
              <th>Adresse</th>
              <th>Code postal</th>
              <th>Ville</th>
              <th>Province</th></tr>";
        while($row = $resultat->fetch_assoc()) { 
          $array[] = $row;
          echo "<tr class='couleur_rangee'>";
          echo "<td>" . $row["nom"] . "</td>
                <td>" . $row["prenom"] . "</td>
                <td>" . $row["telephone"] . "</td>
                <td class='adresse'>" . $row["adresse"] . "</td>
                <td>" . $row["code_postal"] . "</td>
                <td>" . $row["ville"] . "</td>
                <td>" . $row["province"] . "</td>";
                $user['type'] = $_SESSION['type'];
              if ($user['type'] == 'admin') {   
                echo "
                <td><form action='modifier.php' method='post'><input type='hidden' name='modifier' value='" . $row['id'] . "'><button name='" . $row['id']. "'>Modifier</button></form></td>
                <td><form action='supprimer.php' method='post'><input type='hidden' name='supprimer' value='" . $row['id'] . "'><button name='" . $row['id'] . "'>Supprimer</button></form></td>";
              }
          echo "</tr>";
        }
        echo "</table>";
      }
      if ($page_courante >= 2) {
        echo "<form action='liste.php' method='post'><input type='hidden' name='changer_page' value='" . (int)$page_courante - 1 . "'><button>Page précédente</button></form>";
      }
      echo "Page $page_courante de " . $page_total;
      if ($page_courante < $page_total) {
        echo "<form action='liste.php' method='post'><input type='hidden' name='changer_page' value='" . (int)$page_courante + 1 . "'><button>Page suivante</button></form>";
      }
?> 
    </div>
  </div>
  <?php require_once('./footer.php');?>
</body>
</html>