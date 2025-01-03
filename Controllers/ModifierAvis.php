<?php
session_start();
require_once '../Models/Avis.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $note = $_POST['rating'];
    $contenu = $_POST['note'];

    echo "id: " . $id . "<br>";
    echo "note: " . $note . "<br>";
    echo "contenu: " . $contenu . "<br>";

    $avis = new Avis();
    $result = $avis->Modifier_Avis($id, $note, $contenu);

    if ($result) {
        $_SESSION["success"] = "Avis Modifier Avec Success";
        header("Location: /dashboard/client/avis.php");
        exit;
    } else {
        $_SESSION["error"] = "modification de avis est echou";
        header("Location: /dashboard/client/avis.php");
        exit;
    }

} else {
    $_SESSION["error"] = "error de traitement de avis";
    header("Location: /dashboard/client/avis.php");
    exit;
}