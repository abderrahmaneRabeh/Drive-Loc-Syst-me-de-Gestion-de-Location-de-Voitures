<?php
require_once '../Models/Voiture.php';
require_once '../Models/Category.php';

$categoriesVoitures = new Category();
if (isset($_GET['category_id'])) {
    $categoriesVoituresList = $categoriesVoitures->All_VoituresByCategory($_GET['category_id']);
    echo json_encode($categoriesVoituresList);
}