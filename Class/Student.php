<?php 

    include_once 'Database.php';

class Register extends Database{
    


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

    public function deleteRow($id)
    {
        $sql = "DELETE FROM etudiant WHERE id = ?";

        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute([$id]);
    }

    public function editStudent($id)
    {
        $sql = "SELECT * FROM etudiant WHERE id = ?";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function updateStudent($prenom, $nom, $email, $telephone, $id)
    {
        $sql = "UPDATE etudiant SET prenom = ?, nom = ?, email = ?, telephone = ? WHERE id= ?";
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute([$prenom, $nom, $email, $telephone, $id]);
    }

}