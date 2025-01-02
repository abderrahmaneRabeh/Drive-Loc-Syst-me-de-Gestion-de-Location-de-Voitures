<?php

session_start();
require_once '../Models/Avis.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_voiture = $_POST['id_voiture'];
    $note = $_POST['rating'];
    $contenu = $_POST['comment'];
    $user = $_SESSION['user']['id_utilisateur'];

    $Voiture = new Avis();
    $result = $Voiture->Ajouter_Avis($note, $contenu, $user, $id_voiture);

    if ($result) {
        $_SESSION["successAvis"] = "Avis ajouter avec success";
        header("Location: /views/Voiture_details.php?id=$id_voiture");
        exit;
    } else {
        $_SESSION["errorAvis"] = "Avis non ajouter";
        header("Location: /views/Voiture_details.php?id=$id_voiture");
        exit;
    }
}