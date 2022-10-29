<?php



class Database
{

    protected $pdo;

    public function getConfig()
    {
        echo $bddData;
    }

    public function getPDO()
    {
        if($this->pdo === null)
        {
            $json_data = file_get_contents("http://localhost/Annuaire_NWS/database.config.json");
            $data_bdd = json_decode($json_data);
            $pdo = new PDO('mysql:host='.$data_bdd->server.';dbname='.$data_bdd->database, $data_bdd->user, $data_bdd->password);
            $this->pdo = $pdo;
            return $pdo;
        }

        return $this->pdo;
    }

}