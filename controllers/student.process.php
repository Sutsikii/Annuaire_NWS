<?php 

include_once "../Class/Student.php";

$student = new Register();

    if(isset($_POST['update']))
    {
        $id = $_GET['id'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        $student->updateStudent($prenom, $nom, $email, $telephone, $id);

        header("location: {$_SERVER['HTTP_ORIGIN']}/Annuaire_NWS/public/template/liste.php");
    }
    else if($_GET['send'] === 'del')
    {
        $id = $_GET['id'];
        $student->deleteRow($id);

        header("location: {$_SERVER['HTTP_ORIGIN']}/Annuaire_NWS/public/template/liste.php");
    }
