<?php
require "Database.php";
class Statistique extends Database
{

    private $Conx_DataBase;
    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }

    public function Statistique_utilisateur()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM utilisateurs where role_id = 2");
        $query->execute();
        return $query->fetchAll();
    }

    public function Statistique_vehicule()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM vehicule");
        $query->execute();
        return $query->fetchAll();
    }

    public function Statistique_avis()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM avis a JOIN vehicule v on a.vehicule_id = v.id_vehivule JOIN utilisateurs u WHERE a.client_id = u.id_utilisateur");
        $query->execute();
        return $query->fetchAll();
    }

    public function Statistique_reservation()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM reservations join vehicule on reservations.vehicule_id = vehicule.id_vehivule join utilisateurs on reservations.client_id = utilisateurs.id_utilisateur");
        $query->execute();
        return $query->fetchAll();
    }

    public function Statistique_reservation_Confirmee()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM reservations join vehicule on reservations.vehicule_id = vehicule.id_vehivule join utilisateurs on reservations.client_id = utilisateurs.id_utilisateur where statut = 'Confirmee'");
        $query->execute();
        return $query->fetchAll();
    }
    public function Statistique_reservation_en_cours()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM reservations join vehicule on reservations.vehicule_id = vehicule.id_vehivule join utilisateurs on reservations.client_id = utilisateurs.id_utilisateur where statut = 'En attente'");
        $query->execute();
        return $query->fetchAll();
    }
    public function Statistique_reservation_annuler()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM reservations join vehicule on reservations.vehicule_id = vehicule.id_vehivule join utilisateurs on reservations.client_id = utilisateurs.id_utilisateur where statut = 'Annulee'");
        $query->execute();
        return $query->fetchAll();
    }
}