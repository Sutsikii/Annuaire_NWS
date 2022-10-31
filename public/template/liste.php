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
        $afficher = "oui";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <form action="">
        <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" name="keywords" value="<?php echo $keywords ?>" placeholder="Rechercher un étudiant">
                <button type="submit" name="valider" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>


    <?php if (@$afficher=="oui") { ?>
        <div id="nbr"> <p class="text-nbr"> <?=count($tab). " " .(count($tab)>1? "Résultats trouvés": "Résultat trouvé"); ?> </p> </div>
    <?php } ?>

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