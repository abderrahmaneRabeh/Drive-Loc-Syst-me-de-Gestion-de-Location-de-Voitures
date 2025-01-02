<?php
require "Database.php";
class Reservation extends Database
{

    private $Conx_DataBase;
    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }


    public function getAllReservations()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM reservations r JOIN vehicule v on r.vehicule_id = v.id_vehivule JOIN utilisateurs u WHERE r.client_id = u.id_utilisateur");
        $query->execute();
        return $query->fetchAll();
    }

    public function getReservationById($id_reservation)
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM reservations WHERE id_reservation = :id_reservation");
        $query->bindParam(':id_reservation', $id_reservation);
        $query->execute();
        return $query->fetch();
    }

    public function getUserReservation($id_user)
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM reservations, vehicule, utilisateurs WHERE client_id = :id_user AND reservations.vehicule_id = vehicule.id_vehivule AND reservations.client_id = utilisateurs.id_utilisateur");
        $query->bindParam(':id_user', $id_user);
        $query->execute();
        return $query->fetchAll();
    }

    public function AjouterReservation($id_user, $id_vehicule, $date_debut, $date_fin, $lieuPriseEnCharge, $lieuRetour, $statut)
    {
        $query = $this->Conx_DataBase->prepare(query: "CALL inserer_reservation(:id_user, :id_vehicule, :date_debut, :date_fin, :lieuPriseEnCharge, :lieuRetour, :statut) ");
        $query->bindParam(':id_user', $id_user);
        $query->bindParam(':id_vehicule', $id_vehicule);
        $query->bindParam(':date_debut', $date_debut);
        $query->bindParam(':date_fin', $date_fin);
        $query->bindParam(':lieuPriseEnCharge', $lieuPriseEnCharge);
        $query->bindParam(':lieuRetour', $lieuRetour);
        $query->bindParam(':statut', $statut);
        $query->execute();
        return $query->rowCount();
    }

    public function DeleteReservation($id)
    {
        $query = $this->Conx_DataBase->prepare("DELETE FROM reservations WHERE id_reservation = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->rowCount();
    }

    public function UpdateSatutReservation($id, $statut)
    {
        $query = $this->Conx_DataBase->prepare("UPDATE reservations SET statut = :statut WHERE id_reservation = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':statut', $statut);
        $query->execute();
        return $query->rowCount();
    }

    public function UpdateReservationDate($id, $date_debut, $date_fin)
    {
        $query = $this->Conx_DataBase->prepare("UPDATE reservations SET dateDebut = :date_debut, dateFin = :date_fin WHERE id_reservation = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':date_debut', $date_debut);
        $query->bindParam(':date_fin', $date_fin);
        $query->execute();
        return $query->rowCount();
    }
}