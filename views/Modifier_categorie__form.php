<?php
session_start();
require_once '../middleware/Check_user_connexion.php';
require_once '../Controllers/ListVoitureController.php';
require_once '../Controllers/ListCategories.php';
AjouterFormCheck();

$categoryController = new ListCategoriesController();

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $categories = $categoryController->getOneCategory($id);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRIVE-LOC -- Modifier Categorie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/ajouterVoiture.css">

    <link href="../assets/img/vendor-7.png" rel="icon">
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>
    <div class="container">
        <div class="top-buttons">
            <a href="/dashboard/admin/categories.php" class="btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/index.php" class="btn"><i class="fas fa-home"></i> Home</a>
        </div>
        <h2>Modifier une categorie</h2>

        <form action="/Controllers/Modifier_Category.php" method="POST" id="carForm">
            <div id="carGroupContainer">
                <div class="car-card">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $categories['id_category'] ?>">
                        <label for="category_name">Nom de la categorie</label>
                        <input type="text" value="<?= $categories['category_name'] ?>" name="category_name"
                            placeholder="Enter category name" required>
                    </div>
                </div>

            </div>
            <button type="submit" class="form-btn">Modifier Categories</button>
        </form>
    </div>
</body>

</html>