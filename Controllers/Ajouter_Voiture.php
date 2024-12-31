<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modele = $_POST['modele'];
    $marque = $_POST['marque'];
    $prixJournalier = $_POST['prixJournalier'];
    $transmission = $_POST['transmission'];
    $couleur = $_POST['couleur'];
    $kilometrage = $_POST['kilometrage'];
    $voiture_img = $_POST['voiture_img'];
    $disponible = $_POST['disponible'];

    // Since modele, marque, prixJournalier, transmission, couleur, kilometrage, voiture_img, and disponible are arrays
    // You can access each value like this:
    foreach ($modele as $key => $value) {
        $modele_value = $value;
        $marque_value = $marque[$key];
        $prixJournalier_value = $prixJournalier[$key];
        $transmission_value = $transmission[$key];
        $couleur_value = $couleur[$key];
        $kilometrage_value = $kilometrage[$key];
        $voiture_img_value = $voiture_img[$key];
        $disponible_value = $disponible[$key];

        echo "Modele: $modele_value<br>";
        echo "Marque: $marque_value<br>";
        echo "Prix Journalier: $prixJournalier_value<br>";
        echo "Transmission: $transmission_value<br>";
        echo "Couleur: $couleur_value<br>";
        echo "Kilometrage: $kilometrage_value<br>";
        echo "Voiture Image: $voiture_img_value<br>";
        echo "Disponible: $disponible_value<br><br>";
    }
}