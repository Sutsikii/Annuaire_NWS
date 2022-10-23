<?php

class Database
{

    protected $pdo;


    protected function getPDO()
    {
        if($this->pdo === null)
        {
            $pdo = new PDO("mysql:host=localhost;dbname=annuaire", "root", "");
            $this->pdo = $pdo;
            return $pdo;
        }

        return $this->pdo;
    }

}