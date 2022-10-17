<?php

require_once '../../class/Form.php';
require_once '../../Class/Student.php';
require_once '../../Class/Database.php';

$form = new Form($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Annuaire NWS</title>
</head>
<body>

    <div class="navbar">
        <ul>
            <a href="../../index.php"><li>Accueil</li></a>
            <a href="liste.php"><li>Liste des élèves</li></a>
            <a href="add.php"><li>Ajouter un élève</li></a>
        </ul>
    </div>

    <form class="forms-add" action="#" method="post">
        <?php
        echo $form->input('username', 'Prénom', 'text');
        echo $form->input('lastname', 'Nom', 'text');
        echo $form->input('email', 'Email', 'email');
        echo $form->input('telephone', 'Téléphone', 'tel');
        echo $form->submit('forms-send');
        ?>
    </form>

</body>
</html>