<?php
session_start();
require_once '../Models/Avis.php';

$avis = new Avis();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $avis->Delete_Avis($id);

    if ($result) {
        $_SESSION["success"] = "Avis supprimée avec succès";
        header("Location: ../dashboard/client/avis.php");
        exit;
    } else {
        $_SESSION["error"] = "Une erreur s'est produite lors de la suppression de l'avis";
        header("Location: ../dashboard/client/avis.php");
        exit;
    }
} else {
    $_SESSION["error"] = "Une erreur s'est produite lors de la suppression de l'avis";
    header("Location: ../dashboard/client/avis.php");
    exit;
}