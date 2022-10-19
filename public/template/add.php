<?php

    require_once '../../class/Form.php';
    require_once '../../Class/Student.php';
    require_once '../../Class/Database.php';
    require_once '../../Class/Register.php';

    $form = new Form($_POST);
    $re = new Register();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $register = $re->addRegister($_POST);
    }

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

    <?php
        if(isset($register))
        {
            echo($msg);
        }
    ?>

    <form class="forms-add" action="#" method="POST">
        <?php
        echo $form->input('prenom', 'Prénom', 'text');
        echo $form->input('nom', 'Nom', 'text');
        echo $form->input('email', 'Email', 'email');
        echo $form->input('telephone', 'Téléphone', 'tel');
        echo $form->submit('forms-send', 'Register');
        ?>
    </form>

</body>
</html>