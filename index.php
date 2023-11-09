<?php  
    session_start();
    if(!isset($_SESSION["username"])){
    header("Location: connect_user/login.php");
    exit(); 
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once('./header.php');?>
    <div id="main">
        <div class="rectangle">
            <h1>Gestionnaire d'annuaire</h1><br>
            <div class="index_rangee">
                <button onclick="window.location.href = 'liste.php'">Voir la liste des contacts</button>
                <?php
                    if ($_SESSION["type"] == "admin") { 
                ?>
                        <button onclick="window.location.href = 'ajouter.php'">Ajouter un nouveau contact</button> 
                <?php } ?>
            </div>
            <div class="index_rangee">
                <form action="recherche.php" method="POST">
                    <label for="Prénom" class="text_bold">Prénom: </label>
                    <input type="text" name="Prénom" id="Prénom"><br><br>
                    <label for="Nom" class="text_bold">Nom: </label>
                    <input type="text" name="Nom" id="Nom"><br><br>
                    <button type="submit">Recherche</button>
                </form>
            </div>
        </div>
    </div>
    <?php require_once('./footer.php');?>
</body>
</html>