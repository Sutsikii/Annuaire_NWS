<?php

    require_once '../../class/Form.php';
    require_once '../../Class/Student.php';
    require_once '../../Class/Database.php';
    require_once '../../Class/Register.php';

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

    <div class="search">
        <p>Rechercher : </p>
    </div>

    <div class="student-card">
        <?php $request = new Register(); ?>
        <?php if($request->showTables("etudiant")) : ?>
            <?php foreach($request->showTables("etudiant") as $student) : ?>

                <li class="student">
                    <p><?= $student['id'] ?>. <?= $student['prenom'] ?> <?= $student['nom'] ?></p>
                    <h2>Information de contact : </h2>
                    <p><?= $student['email'] ?></p>
                    <p>0<?= $student['telephone'] ?></p>
                    <button>Modifier</button> 
                    <?php echo "<a href='/Annuaire_NWS/controllers/student.process.php?send=del&id=" . $student['id'] . "' class='btn btn-danger'>Supprimer</a>"?>

                </li>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Il n'y pas d'étudiant d'inscrit dans l'annuaire</p>
        <?php endif; ?>
    </div>

</body>
</html>