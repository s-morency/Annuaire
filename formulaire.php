<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["modifier"])) {
        $json = file_get_contents('annuaire.json');
        $annuaire = json_decode($json, true); 
        $id = $_POST["modifier"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $telephone = $_POST["telephone"];
        $adresse = $_POST["adresse"];
        $code_postal = $_POST["code_postal"];
        $ville = $_POST["ville"];
        $province = $_POST["province"];
        $annuaire['personnes'][$id]['nom'] = $nom;
        $annuaire['personnes'][$id]['prenom'] = $prenom;
        $annuaire['personnes'][$id]['telephone'] = $telephone;
        $annuaire['personnes'][$id]['adresse'] = $adresse;
        $annuaire['personnes'][$id]['code_postal'] = $code_postal;
        $annuaire['personnes'][$id]['ville'] = $ville;
        $annuaire['personnes'][$id]['province'] = $province;
        $new_json = json_encode($annuaire);
        file_put_contents('annuaire.json', $new_json);
        $message = "Modification faite."; 
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["supprimer"])) {
        $json = file_get_contents('annuaire.json');
        $annuaire = json_decode($json, true); 
        $id = $_POST["supprimer"];
        unset($annuaire['personnes'][$id]);
        $new_json = json_encode($annuaire);
        file_put_contents('annuaire.json', $new_json);
        $message = "Suppression faite.";  
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaires</title>
</head>
<body>
    <?= $message ?>
</body>
</html>