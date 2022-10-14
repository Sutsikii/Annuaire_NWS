<?php

require_once 'Class/Student.php';
require_once 'Class/Form.php';

$form = new Form($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="public/css/reset.css"> -->
    <link rel="stylesheet" href="public/css/style.css">
    <title>Annuaire NWS</title>
</head>
<body>

    <h1>Annuaire Normandie Web School</h1>

    <?php
    echo $form->input('username');
    echo $form->input('password');
    echo $form->submit();
    ?>

</body>
</html>
<form action="#" method="post">

</form>