<?php
session_start();
require_once '../Models/Reservation.php';
require_once '../middleware/Check_user_connexion.php';
Check_Home_Page();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $ReservationObj = new Reservation();
    $reservation = $ReservationObj->getReservationById($id);
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
        <h2>Modifier Reservation</h2>

        <form action="/Controllers/Modifier_Reservation.php" method="POST" id="carForm">
            <input type="hidden" name="id_reservation" value="<?= $reservation['id_reservation'] ?>">
            <!-- Date début -->
            <?php
            if (isset($_SESSION["error"])) {
                echo "<div class=\"alert\">" . $_SESSION["error"] . "</div>";
                unset($_SESSION["error"]);
            }
            ?>
            <div class="form-group-row car-card">
                <div class="form-group">
                    <label for="dateDebut">Date de début</label>
                    <input type="date" name="dateDebut" value="<?= $reservation['dateDebut'] ?>" id="dateDebut"
                        class="form-control" required>
                </div>
                <!-- Date fin -->
                <div class="form-group">
                    <label for="dateFin">Date de fin</label>
                    <input type="date" name="dateFin" value="<?= $reservation['dateFin'] ?>" id="dateFin"
                        class="form-control" required>
                </div>
            </div>
            <button type="submit" class="form-btn">Modifier Reservation</button>
        </form>
    </div>
</body>

</html>