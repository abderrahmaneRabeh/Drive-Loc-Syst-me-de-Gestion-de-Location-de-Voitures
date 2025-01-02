<?php

session_start();
require_once '../Models/Reservation.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_user = $_SESSION['user']['id_utilisateur'];
    $id_vihicule = $_POST['id_voiture'];
    $date_debut = $_POST['dateDebut'];
    $date_fin = $_POST['dateFin'];
    $lieuPriseEnCharge = $_POST['lieuPriseCharge'];
    $lieuRetour = $_POST['lieuRetour'];
    $statut = "En attente";

    $currentDate = date('Y-m-d');
    if ($date_debut < $currentDate || $date_fin < $currentDate) {
        $_SESSION["error"] = "Les dates sélectionnées ne peuvent pas être dans le passé";
        header("Location: /views/Voiture_details.php?id=$id_vihicule");
        exit;
    }

    if ($date_debut >= $date_fin) {
        $_SESSION["error"] = "La date de début doit être avant la date de fin";
        header("Location: /views/Voiture_details.php?id=$id_vihicule");
        exit;
    }


    $AjouterReservation = new Reservation();
    $result = $AjouterReservation->AjouterReservation($id_user, $id_vihicule, $date_debut, $date_fin, $lieuPriseEnCharge, $lieuRetour, $statut);

    if ($result) {
        $_SESSION["success"] = "Reservation ajouter avec success";
        header("Location: /dashboard/admin/reservation.php");
        exit;
    } else {
        $_SESSION["error"] = "Reservation non ajouter";
        header("Location: /dashboard/admin/reservation.php");
        exit;
    }

}