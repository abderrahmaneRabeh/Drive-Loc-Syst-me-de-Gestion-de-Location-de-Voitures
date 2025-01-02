<?php
session_start();
require_once '../Models/Reservation.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_reservation = $_POST['id_reservation'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];


    if (strtotime($dateDebut) < time()) {
        $_SESSION["error"] = "La date de début doit être une date future.";
        header("Location: /views/Update_Reservation__form.php?id=$id_reservation");
        exit;
    }
    if (strtotime($dateFin) < time()) {
        $_SESSION["error"] = "La date de fin doit être une date future.";
        header("Location: /views/Update_Reservation__form.php?id=$id_reservation");
        exit;
    }

    // Vérifier si la date de fin est après la date de début
    if (strtotime($dateFin) <= strtotime($dateDebut)) {
        $_SESSION["error"] = "La date de fin doit être posterieure à la date de début.";
        header("Location: /views/Update_Reservation__form.php?id=$id_reservation");
        exit;
    }

    // Modifier la réservation
    $reservation = new Reservation();
    $result = $reservation->UpdateReservationDate($id_reservation, $dateDebut, $dateFin);

    if ($result) {
        $_SESSION["success"] = "La reservation a bien été modifiée.";
        header("Location: /dashboard/client/reservation.php?id=$id_reservation");
        exit;
    } else {
        $_SESSION["error"] = "Une erreur s'est produite lors de la modification de la reservation.";
        header("Location: /dashboard/client/reservation.php?id=$id_reservation");
        exit;
    }
}
?>