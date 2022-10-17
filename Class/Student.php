<?php

require_once 'Database.php';

class Student extends Database
{
    public $prenom;
    public $nom;
    public $email;
    public $telephone;

    public function __construct($prenom, $nom, $email, $telephone)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    public function addStudent($prenom, $nom, $email, $telephone)
    {
        $sql = $this->getPDO()->query("INSERT INTO etudiant(prenom, nom, email, telephone) value(?,?,?,?)");
        $request = $this->getPDO()->prepare($sql);
        $request->execute(array($prenom, $nom, $email, $telephone));
    }
}
