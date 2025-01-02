<?php
session_start();
require_once '../../middleware/Check_user_connexion.php';
require_once '../../Models/Voiture.php';

Dashboard_admin_check_roleConnect();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$ListVoitureController = new Voiture();
$listVoiture = $ListVoitureController->getVoitures($page);

$totalLignes = $ListVoitureController->Nbr_Voiture();
$LigneParPage = $ListVoitureController->getLinesParPage();

$LignesSelectioner = ceil($totalLignes / $LigneParPage);

?>


<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voiture</title>

    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="icon" href="../../assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/Reservation.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">


</head>

<body>

    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-icon">
                    <div class="app-icon-title app-icon-title-a-tag">
                        <a href="../../index.php">
                            DRIVE-<span class="text-primary">LOC</span>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="/index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        <span>Acceuil</span>
                    </a>
                </li>
                <li class="sidebar-list-item active">
                    <a href="./voiture.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-car">
                            <path d="M15 10l-3 3h8l-1.5 1.5L15 10z" />
                            <path d="M10 8h4L10 2 6 8h4l-2 2z" />
                        </svg>
                        <span>Voiture</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./categories.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-grid">
                            <rect x="3" y="3" width="7" height="7" />
                            <rect x="14" y="3" width="7" height="7" />
                            <rect x="14" y="14" width="7" height="7" />
                            <rect x="3" y="14" width="7" height="7" />
                        </svg>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./reservation.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        <span>Reservations</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./statistique.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-activity">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                        </svg>
                        <span>Statistiques</span>
                    </a>
                </li>
            </ul>
            <div class="account-info">
                <?php
                if (isset($_SESSION["user"])) {
                    echo "<div class=\"account-info-name\">" . $_SESSION["user"]["username"] . "</div>";

                } else {
                    echo '<li class="scroll-to-section"><a href="./pages/login.php" id="login">S\'inscrire</a></li>';
                }

                ?>
                <a href="../../Controllers/Lougout.php" class="account-info-more lougout-btn">
                    <button class="account-info-more"
                        style="display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>
        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Voitures</h1>
                <button class="mode-switch" title="Switch Theme">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
            </div>
            <div class="app-content-actions">
                <div class="app-content-actions-wrapper">
                    <div class="filter-button-wrapper">
                        <button class="action-button d-none filter jsFilter"></button>
                    </div>
                    <button class="action-button d-none list active" title="List View">
                    </button>
                    <button class="action-button d-none grid" title="Grid View">
                    </button>
                </div>
            </div>
            <div class="alert-wrapper">
                <?php
                if (isset($_SESSION["success"])) {
                    echo "<div class=\"alert alert-success\">" . $_SESSION["success"] . "</div>";
                    unset($_SESSION["success"]);
                }
                if (isset($_SESSION["error"])) {
                    echo "<div class=\"alert alert-danger\">" . $_SESSION["error"] . "</div>";
                    unset($_SESSION["error"]);
                }
                ?>
            </div>
            <div class="products-area-wrapper tableView">
                <!-- Add New Voiture Button -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 style="color: white;">Liste des Voitures</h2>
                    <a href="/views/Ajouter_voiture__form.php" class="btn"
                        style="background-color: #fff; color: #000;">Ajouter une Nouvelle
                        Voiture</a>
                </div>

                <!-- start Table -->
                <table class="table table-dark table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Modèle</th>
                            <th>Marque</th>
                            <th>Prix Journalier</th>
                            <th>Transmission</th>
                            <th>Couleur</th>
                            <th>Kilométrage</th>
                            <th>Disponible</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listVoiture as $voiture) { ?>
                            <tr>
                                <td><?= $voiture['id_vehivule'] ?></td>
                                <td><?= $voiture['modele']; ?></td>
                                <td><?= $voiture['marque']; ?></td>
                                <td>$<?= $voiture['prixJournalier']; ?></td>
                                <td><?= $voiture['transmission']; ?></td>
                                <td><?= $voiture['couleur']; ?></td>
                                <td><?= $voiture['kilometrage']; ?>Km</td>
                                <td class="text-center">
                                    <?php if ($voiture['disponible']) { ?>
                                        <span class="badge badge-success">Oui</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Non</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a href="/views/Modifier_voiture__form.php?id=<?= $voiture['id_vehivule']; ?>"
                                        class="btn btn-warning btn-sm">Modifier</a>
                                    <a href="/Controllers/Delete_Voiture.php?id=<?= $voiture['id_vehivule']; ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Voulez-vous supprimer ce véhicule ?')">Supprimer</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- end Table -->
                <!-- Pagination -->
                <div class="container-fluid pt-4 pb-3">
                    <div class="d-flex justify-content-center">
                        <nav>
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item">
                                    <?php
                                    if ($page > 1) {
                                        $previous = $page - 1;
                                        echo "<a class='page-link' href='?page=$previous' style='background-color: #ffc107; color: #000;'><i class='fa fa-angle-double-left'></i></a>";
                                    } else {
                                        echo "<a class='page-link' href='?page=1' style='background-color: #6c757d; color: #fff; cursor: not-allowed;'><i class='fa fa-angle-double-left'></i></a>";
                                    }
                                    ?>
                                </li>
                                <?php
                                for ($i = 1; $i <= $LignesSelectioner; $i++) {
                                    if ($page == $i) {
                                        echo "<li class='page-item active'><a class='page-link' href='#' style='background-color: #28a745; border-color: #28a745;'>$i<span class='sr-only'></span></a></li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='?page=$i' style='background-color: #1a1a2e; color: #fff; border-color: #444;'>$i</a></li>";
                                    }
                                }
                                ?>
                                <li class="page-item">
                                    <?php
                                    if ($page < $LignesSelectioner) {
                                        $suivant = $page + 1;
                                        echo "<a class='page-link' href='?page=$suivant' style='background-color: #ffc107; color: #000;'><i class='fa fa-angle-double-right'></i></a>";
                                    } else {
                                        echo "<a class='page-link' href='?page=$LignesSelectioner' style='background-color: #6c757d; color: #fff; cursor: not-allowed;'><i class='fa fa-angle-double-right'></i></a>";
                                    }
                                    ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>