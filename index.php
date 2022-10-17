<?php

require_once 'Class/Student.php';
require_once 'Class/Form.php';
require_once 'Class/Database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Annuaire NWS</title>
</head>
<body>

    <div class="navbar">
        <ul>
            <a href="index.php"><li>Accueil</li></a>
            <a href="public/template/liste.php"><li>Liste des élèves</li></a>
            <a href="public/template/add.php"><li>Ajouter un élève</li></a>
        </ul>
    </div>

    <div class="logo">
        <h1>Annuaire Normandie Web School</h1>

        <img class="logo" src="public/src/nws_logo.png" alt="">
    </div>
</body>
</html>


