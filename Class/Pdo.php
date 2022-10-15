<?php 

    try
    {
        $db = new PDO("mysql:host=localhost;dbname=annuaire", "root", "");
    }
    catch(PDOExcpetion $e)
    {
        echo $e->getMessage();
    }
