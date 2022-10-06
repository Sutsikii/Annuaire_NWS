<?php

require_once 'Class/Student.php';
require_once 'Class/Form.php';

$form = new Form($_POST);

echo $form->input('username');
echo $form->input('password');
echo $form->submit();