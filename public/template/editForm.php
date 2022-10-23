 <?php

    require_once '../../class/Form.php';
    require_once '../../Class/Student.php';
    require_once '../../Class/Database.php';

    $form = new Form($_POST);
    $student = new Register();
    $student = $student->editStudent($_GET['id']);
    $prenom = $student['prenom'];
    $nom = $student['nom'];
    $email = $student['email'];
    $telephone = $student['telephone'];
    $id = $student['id'];

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

    <div class="edit">
        <h2> Modification </h2>
    </div>

    <?php
        if(isset($msg))
            echo($msg);
    ?>

    <form class="forms-add" action="../../controllers/student.process.php?send=update&id=<?= $id ?>" method="POST">
        <?php
            echo $form->input('prenom', 'Prénom', 'text', $prenom);
            echo $form->input('nom', 'Nom', 'text', $nom);
            echo $form->input('email', 'Email', 'email', $email);
            echo $form->input('telephone', 'Téléphone', 'tel', $telephone);
        ?>
        <div class="buttons">
            <?php
                echo $form->return('forms-send', 'Register', 'Retour', 'liste.php');
                echo $form->submit('forms-send', 'update', 'Sauvegarder');
            ?>
        </div>
        
    </form>

</body>
</html>