<?php
require "Database.php";
class Avis extends Database
{

    private $Conx_DataBase;
    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }

    public function getAllAvis()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM avis a JOIN vehicule v on a.vehicule_id = v.id_vehivule JOIN utilisateurs u WHERE a.client_id = u.id_utilisateur");
        $query->execute();
        return $query->fetchAll();
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

    public function Delete_Avis($id)
    {
        $query = $this->Conx_DataBase->prepare("UPDATE avis SET estSupprime = 1 WHERE id_avis = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->rowCount();
    }

    public function getUserAvis($id_user)
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM avis, vehicule, utilisateurs WHERE client_id = :id_user AND avis.vehicule_id = vehicule.id_vehivule AND avis.client_id = utilisateurs.id_utilisateur");
        $query->bindParam(':id_user', $id_user);
        $query->execute();
        return $query->fetchAll();
    }
}