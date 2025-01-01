<?php

session_start();
require_once '../middleware/Check_user_connexion.php';
require_once '../Controllers/ListVoitureController.php';
require_once '../Controllers/ListCategories.php';

Dashboard_admin_check_roleConnect();

$ListVoitureController = new ListVoitureController();
$GategoryController = new ListCategoriesController();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Voiture = $ListVoitureController->Get_One_Voiture($id);
    $categories = $GategoryController->List_Categories();
} else {
    header("Location: /index.php");
    exit;
}

// echo "<pre>";
// print_r($Voiture);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRIVE-LOC -- Modifier Voiture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/ajouterVoiture.css">

    <link href="../assets/img/vendor-7.png" rel="icon">
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>
    <div class="container">
        <div class="top-buttons">
            <a href="/dashboard/admin/voiture.php" class="btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/index.php" class="btn"><i class="fas fa-home"></i> Home</a>
        </div>
        <h2>Modifier Voiture</h2>

        <form action="/Controllers/Ajouter_Voiture.php" method="POST" id="carForm">
            <div id="carGroupContainer">
                <div class="car-card">
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="modele">Modele</label>
                            <input type="text" name="modele" value="<?= $Voiture['modele'] ?>"
                                placeholder="Enter car model" required>
                        </div>
                        <div class="form-group">
                            <label for="marque">Marque</label>
                            <input type="text" name="marque" value="<?= $Voiture['marque'] ?>"
                                placeholder="Enter car brand" required>
                        </div>
                        <div class="form-group">
                            <label for="prixJournalier">Prix Journalier</label>
                            <input type="number" name="prixJournalier" value="<?= $Voiture['prixJournalier'] ?>"
                                placeholder="Enter daily price" required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="transmission">Transmission</label>
                            <select name="transmission" required>
                                <?php if ($Voiture['transmission'] == 'Manuelle'): ?>
                                    <option value="Manuelle" selected>Manuelle</option>
                                    <option value="Automatique">Automatique</option>
                                <?php elseif ($Voiture['transmission'] == 'Automatique'): ?>
                                    <option value="Manuelle">Manuelle</option>
                                    <option value="Automatique" selected>Automatique</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="couleur">Couleur</label>
                            <input type="text" name="couleur" value="<?= $Voiture['couleur'] ?>"
                                placeholder="Enter car color" required>
                        </div>
                        <div class="form-group">
                            <label for="kilometrage">Kilométrage</label>
                            <input type="number" name="kilometrage" value="<?= $Voiture['kilometrage'] ?>"
                                placeholder="Enter mileage" required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="voiture_img">Voiture Image</label>
                            <input type="text" name="voiture_img" value="<?= $Voiture['image_url'] ?>"
                                placeholder="Enter url de l'image" required>
                        </div>
                        <div class="form-group">
                            <label for="disponible">Disponible</label>
                            <select name="disponible" required>
                                <?php if ($Voiture['disponible'] == 1): ?>
                                    <option value="1" selected>Oui</option>
                                    <option value="0">Non</option>
                                <?php elseif ($Voiture['disponible'] == 0): ?>
                                    <option value="1">Oui</option>
                                    <option value="0" selected>Non</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="disponible">Category</label>
                            <select name="category" required>
                                <option value="" selected>Choisissez une categorie</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id_category'] ?>"
                                        <?php if ($Voiture['categorie_id'] == $category['id_category']) echo 'selected'; ?>><?= $category['category_name'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <button type="submit" class="form-btn">Modifier Voiture</button>
        </form>
    </div>
</body>

</html>