<?php
session_start();
require_once '../middleware/Check_user_connexion.php';
AjouterFormCheck();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRIVE-LOC -- Ajouter Categorie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/ajouterVoiture.css">

    <link href="../assets/img/vendor-7.png" rel="icon">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <div class="container">
        <div class="top-buttons">
            <a href="../dashboard/admin/categories.php" class="btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="../index.php" class="btn"><i class="fas fa-home"></i> Home</a>
        </div>
        <h2>Ajouter une categorie</h2>

        <form action="../Controllers/Ajouter_Category.php" method="POST" id="carForm">
            <div id="carGroupContainer">
                <div class="car-card">
                    <h3>Category 1</h3>
                    <div class="form-group">
                        <label for="category_name">Nom de la categorie</label>
                        <input type="text" name="category_name[]" placeholder="Enter category name" required>
                    </div>
                </div>

            </div>
            <button type="button" class="add-car-btn" id="addCarBtn">Ajouter une autre</button>
            <button type="submit" class="form-btn">Ajouter Categories</button>
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
            newCard.querySelector('h3').textContent = `Category ${carCards.length + 1}`;

            // Clear input values in the cloned card
            newCard.querySelectorAll('input').forEach(input => input.value = '');

            carGroupContainer.appendChild(newCard);
        });
    </script>
</body>

</html>