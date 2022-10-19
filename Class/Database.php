<?php

class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    // public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    // {
    //     $this->db_name = $db_name;
    //     $this->db_user = $db_user;
    //     $this->db_pass = $db_pass;
    //     $this->db_host = $db_host;
    // }

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

    public function query($statement)
    {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    // public function addDatas($prenom, $nom, $email, $telephone)
    // {
    //     $sql = "INSERT INTO etudiant(prenom, nom, email, telephone) value(?,?,?,?)";
    //     $request = $this->getPDO()->prepare($sql);
    //     $request->execute(array($prenom, $nom, $email, $telephone));
    // }

}