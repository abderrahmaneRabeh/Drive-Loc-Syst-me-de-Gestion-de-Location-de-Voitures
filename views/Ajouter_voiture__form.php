<?php
session_start();
require_once '../Controllers/ListVoitureController.php';
require_once '../Controllers/ListCategories.php';
require_once '../middleware/Check_user_connexion.php';
AjouterFormCheck();


$GategoryController = new ListCategoriesController();
$categories = $GategoryController->List_Categories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRIVE-LOC -- Ajouter Voiture</title>
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
        <h2>Ajouter une voiture</h2>

        <form action="/Controllers/Ajouter_Voiture.php" method="POST" id="carForm">
            <div id="carGroupContainer">
                <div class="car-card">
                    <h3>Voiture 1</h3>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="modele">Modele</label>
                            <input type="text" name="modele[]" placeholder="Enter car model" required>
                        </div>
                        <div class="form-group">
                            <label for="marque">Marque</label>
                            <input type="text" name="marque[]" placeholder="Enter car brand" required>
                        </div>
                        <div class="form-group">
                            <label for="prixJournalier">Prix Journalier</label>
                            <input type="number" name="prixJournalier[]" placeholder="Enter daily price" required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="transmission">Transmission</label>
                            <select name="transmission[]" required>
                                <option value="">Select transmission</option>
                                <option value="Manuelle">Manuelle</option>
                                <option value="Automatique">Automatique</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="couleur">Couleur</label>
                            <input type="text" name="couleur[]" placeholder="Enter car color" required>
                        </div>
                        <div class="form-group">
                            <label for="kilometrage">Kilométrage</label>
                            <input type="number" name="kilometrage[]" placeholder="Enter mileage" required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="voiture_img">Voiture Image</label>
                            <input type="text" name="voiture_img[]" placeholder="Enter url de l'image" required>
                        </div>
                        <div class="form-group">
                            <label for="disponible">Disponible</label>
                            <select name="disponible[]" required>
                                <option value="">Is it available?</option>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="disponible">Category</label>
                            <select name="category[]" required>
                                <option value="" selected>Choisissez une categorie</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id_category'] ?>"><?= $category['category_name'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <button type="button" class="add-car-btn" id="addCarBtn">Ajouter une autre</button>
            <button type="submit" class="form-btn">Ajouter Voitures</button>
        </form>
    </div>

    <script>
        document.getElementById('addCarBtn').addEventListener('click', function () {
            const carGroupContainer = document.getElementById('carGroupContainer');
            const carCards = document.querySelectorAll('.car-card');
            console.log("cards", carCards);
            const newCard = carCards[0].cloneNode(true);
            console.log("New card", newCard);

            // Update the title of the new card
            newCard.querySelector('h3').textContent = `Voiture ${carCards.length + 1}`;

            // Clear input values in the cloned card
            newCard.querySelectorAll('input').forEach(input => input.value = '');
            newCard.querySelectorAll('select').forEach(select => select.value = '');

            carGroupContainer.appendChild(newCard);
        });
    </script>
</body>

</html>