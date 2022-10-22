<?php 

include_once "../Class/Register.php";

$student = new Register();

    if($_GET['send'] === 'del')
    {
        $id = $_GET['id'];
        $student->deleteRow($id);

        header("location: {$_SERVER['HTTP_ORIGIN']}/Annuaire_NWS/index.php?status=deleted");
    }