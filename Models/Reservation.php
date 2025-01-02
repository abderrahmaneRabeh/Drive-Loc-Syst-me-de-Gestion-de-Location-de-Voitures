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
}