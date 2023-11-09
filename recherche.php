<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Annuaire</title>
</head>

<body>
<?php require_once('./header.php');?>
  <div id="main">
    <div>

<?php require_once('connexion_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['Prénom'];
    $nom = $_POST['Nom'];
}
if ($prenom != "" && $nom != "") {
    $sql = "SELECT * FROM personne WHERE prenom LIKE '%" . $prenom ."%' AND nom LIKE '%" . $nom ."%'";
} elseif ($prenom != "" || $nom != "") {
    if ($prenom != "") {
        $sql = "SELECT * FROM personne WHERE prenom LIKE '%" . $prenom ."%'";
    } elseif ($nom != "") {
        $sql = "SELECT * FROM personne WHERE nom LIKE '%" . $nom ."%'";
    }


$resultat = $conn->query($sql);
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
    } else {
    echo "Aucun résultat trouvé.";
  }
} else {
    echo "SVP entrez un nom ou un prénom dans la page d'accueil pour faire une recherche.<br><br>";
    echo '<button id="bouton_header" onclick="window.location.href = \'index.php\'">Retour à la page d\'accueil</button>';
}
$conn->close();
?>
</div>
</div>

</body>

</html>