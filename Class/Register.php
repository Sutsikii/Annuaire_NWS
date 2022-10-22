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

        if(isset($prenom) || isset($nom) || isset($email) || isset($telephone))
        {
            $query = "INSERT INTO etudiant (prenom, nom, email, telephone) VALUES (?,?,?,?)";
            $request = $this->getPDO()->prepare($query);
            $request->execute([$prenom, $nom, $email, $telephone]);
        }
        else
        {
            $msg = "Tous les champs sont obligatoires.";
            return $msg;
        }
    }

    public function showTables($table)
    {
        $sql = "SELECT * FROM `$table`";

        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll())
        {
            return $result;
        }
    }

}