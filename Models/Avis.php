<?php
require "Database.php";
class Avis extends Database
{

    private $Conx_DataBase;
    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }


    public function Ajouter_Avis($note, $contenu, $id_client, $id_vehicule)
    {
        $query = $this->Conx_DataBase->prepare("INSERT INTO avis (note, contenu, client_id, vehicule_id) VALUES (:note, :contenu, :id_client, :id_vehicule)");
        $query->bindParam(':note', $note);
        $query->bindParam(':contenu', $contenu);
        $query->bindParam(':id_client', $id_client);
        $query->bindParam(':id_vehicule', $id_vehicule);
        $query->execute();
        return $query->rowCount();
    }
}