<?php

    require_once '../../class/Form.php';
    require_once '../../Class/Student.php';
    require_once '../../Class/Database.php';

    $student = new Register();

    @$keywords = $_GET["keywords"];
    @$valider =$_GET["valider"];
    if(isset($valider) && !empty(trim($keywords)))
    {
        $res = $student->getPDO()->prepare("SELECT * FROM etudiant WHERE prenom like '%$keywords%'");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $tab = $res->fetchAll(); 

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

    <div class="search">
        <form action="">
            <input type="text" name="keywords" value="<?php echo $keywords ?>" placeholder="Rechercher">
            <input type="submit" name="valider" value="Rechercher">
        </form>
    </div>

    <div id="nbr"><?php if(isset($valider) && !empty(trim($keywords))) @count($tab). " ".(@count($tab)>1?"résultats trouvés":"résultat trouvé"); ?></div>

    <div class="student-card">
        <?php $request = new Register(); ?>
        <?php if(isset($valider) && !empty(trim($keywords))) :?>
            <?php foreach($tab as $student) : ?>

                <li class="student">
                    <p><?= $student['prenom'] ?> <?= $student['nom'] ?></p>
                    <h2>Information de contact : </h2>
                    <p><?= $student['email'] ?></p>
                    <p><?= $student['telephone'] ?></p>
                    <a href="editForm.php?id=<?= $student['id']?>">Modifier </a> 
                    <a href="/Annuaire_NWS/controllers/student.process.php?send=del&id=<?= $student['id']?>">Supprimer</a>

                </li>

            <?php endforeach; ?>

        <?php elseif($request->showTables("etudiant")) : ?>
            <?php foreach($request->showTables("etudiant") as $student) : ?>

                <li class="student">
                    <p><?= $student['prenom'] ?> <?= $student['nom'] ?></p>
                    <h2>Information de contact : </h2>
                    <p><?= $student['email'] ?></p>
                    <p><?= $student['telephone'] ?></p>
                    <a href="editForm.php?id=<?= $student['id']?>">Modifier </a> 
                    <a href="/Annuaire_NWS/controllers/student.process.php?send=del&id=<?= $student['id']?>">Supprimer</a>

                </li>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Il n'y pas d'étudiant d'inscrit dans l'annuaire</p>
        <?php endif; ?>
    </div>

</body>
</html>