<?php 

    include_once 'Database.php';

class Register extends Database{
    
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addRegister($data)
    {
        $prenom = $data['prenom'];
        $nom = $data['nom'];
        $email = $data['email'];
        $telephone = $data['telephone'];

        if(empty($prenom) || empty($nom) || empty($email) || empty($telephone))
        {
            $msg = "Tous les champs sont obligatoires.";
            return $msg;
        }
        else
        {
            $query = "INSERT INTO etudiant(prenom, nom, email, telephone) value(?,?,?,?)";
            $request = $this->getPDO()->prepare($query);
            $request->execute(array($prenom, $nom, $email, $telephone));
        }
    }

}