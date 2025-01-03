<?php
session_start();
require_once '../Models/Avis.php';
require_once '../middleware/Check_user_connexion.php';
Check_Home_Page();

$Avis = new Avis();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $avis = $Avis->getOneAvis($id);

    // echo "<pre>";
    // print_r($avis);
    // echo "</pre>";
}
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
    <style>
        .alert {
            padding: 10px;
            background-color: #f44336;
            color: white;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="top-buttons">
            <a href="/dashboard/admin/voiture.php" class="btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/index.php" class="btn"><i class="fas fa-home"></i> Home</a>
        </div>
        <h2>Modifier Avis</h2>

        <form action="/Controllers/ModifierAvis.php" method="POST" id="carForm">
            <input type="hidden" name="id_reservation" value="<?= $reservation['id_reservation'] ?>">
            <!-- Date début -->
            <?php
            if (isset($_SESSION["error"])) {
                echo "<div class=\"alert\">" . $_SESSION["error"] . "</div>";
                unset($_SESSION["error"]);
            }
            ?>
            <div class="form-group-row car-card">
                <input type="hidden" name="id" value="<?= $avis['id_avis'] ?>">
                <div class="form-group">
                    <label for="note">Note</label>
                    <input type="text" name="note" value="<?= $avis['contenu'] ?>" id="note" class="form-control"
                        required>
                </div>
                <!-- Date fin -->
                <div class="form-group">
                    <label for="rating">Note</label>
                    <select name="rating" id="rating" class="form-control" required>
                        <option value="" selected disabled>Choisissez une note</option>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($avis['note'] == $i): ?>
                                <option value="<?= $i ?>" selected>
                                    <?= str_repeat('&#9733; ', $i) ?>
                                </option>
                            <?php else: ?>
                                <option value="<?= $i ?>">
                                    <?= str_repeat('&#9733; ', $i) ?>
                                </option>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="form-btn">Modifier Avis</button>
        </form>
    </div>
</body>

</html>