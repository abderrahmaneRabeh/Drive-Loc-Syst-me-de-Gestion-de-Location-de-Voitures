<?php
session_start();
require_once '../../middleware/Check_user_connexion.php';
require_once '../../Models/statistique.php';
Dashboard_admin_check_roleConnect();


$statistique = new Statistique();
$statistique_utilisateur = $statistique->Statistique_utilisateur();
$statistique_vehicule = $statistique->Statistique_vehicule();
$statistique_avis = $statistique->Statistique_avis();
$statistique_reservation = $statistique->Statistique_reservation();
$statistique_reservation_Confirmee = $statistique->Statistique_reservation_Confirmee();
$statistique_reservation_en_cours = $statistique->Statistique_reservation_en_cours();
$statistique_reservation_annuler = $statistique->Statistique_reservation_annuler();

$Nbr_utilisateur = count($statistique_utilisateur);
$Nbr_vehicule = count($statistique_vehicule);
$Nbr_avis = count($statistique_avis);
$Nbr_reservation = count($statistique_reservation);
$Nbr_reservation_Confirmee = count($statistique_reservation_Confirmee);
$Nbr_reservation_en_cours = count($statistique_reservation_en_cours);
$Nbr_reservation_annuler = count($statistique_reservation_annuler);



?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Statistique</title>

    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/main.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <link href="/assets/img/vendor-7.png" rel="icon">


    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="icon" href="../../assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/Reservation.css">

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
                <li class="sidebar-list-item">
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
                <li class="sidebar-list-item active">
                    <a href="./statistique.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-activity">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                        </svg>
                        <span>Statistiques</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./avis.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-message-circle">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M8.56 4.38A8 8 0 0 0 1 12h6.14l1.98-2.96L8.56 4.38z" />
                        </svg>
                        <span>Avis</span>
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
                <a href="../../controllers/lougout.php" class="account-info-more lougout-btn">
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
                <h1 class="app-content-headerText">Statistiques</h1>
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
            <div class="products-area-wrapper tableView">
                <!-- diplay users starts -->
                <div class="users-table-container text-white">
                    <h2 class="section-title">Registered Users</h2>
                    <p class="user-count">Total Users: <span
                            class="badge badge-pill badge-primary"><?php echo $Nbr_utilisateur; ?></span></p>
                    <table class="users-table table table-striped table-bordered text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($statistique_utilisateur)) {
                                foreach ($statistique_utilisateur as $index => $user) {
                                    echo "<tr>
                                            <td>" . htmlspecialchars($user['username']) . "</td>
                                            <td>" . htmlspecialchars($user['email']) . "</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='3' class='no-data text-center'>No users found</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- diplay users ends -->

                <!-- diplay vehicles starts -->
                <div class="users-table-container text-white">
                    <h2 class="section-title">Vehicules Disponible</h2>
                    <p class="user-count">Total Vehicules: <span
                            class="badge badge-pill badge-primary"><?php echo $Nbr_vehicule; ?></span></p>
                    <table class="users-table table table-striped table-bordered text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>Modèle</th>
                                <th>Marque</th>
                                <th>Prix Journalier</th>
                                <th>Transmission</th>
                                <th>Couleur</th>
                                <th>Kilométrage</th>
                                <th>Disponible</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            if (!empty($statistique_vehicule)) {
                                foreach ($statistique_vehicule as $index => $voiture) {
                                    if ($count < 5) { ?>
                                        <tr>
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
                                        </tr>
                                    <?php }
                                    $count++;
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='3' class='no-data text-center'>No users found</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="../../views/List_Voitures.php" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
                <!-- diplay vehicles ends -->

                <!-- diplay reservations starts -->
                <div class="users-table-container text-white">
                    <h2 class="section-title">Reservations</h2>
                    <p class="user-count">Total Reservations: <span
                            class="badge badge-pill badge-primary"><?php echo $Nbr_reservation; ?></span></p>
                    <table class="users-table table table-striped table-bordered text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>Client</th>
                                <th>vehicule</th>
                                <th>dateDebut</th>
                                <th>dateFin</th>
                                <th>lieuPriseCharge</th>
                                <th>lieuRetour</th>
                                <th>Date de Reservation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($statistique_reservation)) {
                                foreach ($statistique_reservation as $index => $reservation) { ?>
                                    <tr>
                                        <td><?= $reservation['username'] ?></td>
                                        <td><?= $reservation['marque']; ?>         <?= $reservation['modele']; ?></td>
                                        <td><?= $reservation['dateDebut']; ?></td>
                                        <td><?= $reservation['dateFin']; ?></td>
                                        <td><?= $reservation['lieuPriseCharge']; ?></td>
                                        <td><?= $reservation['lieuRetour']; ?></td>
                                        <td class="text-center"><?= $reservation['dateCreation']; ?></td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr>
                                        <td colspan='3' class='no-data text-center'>No users found</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- diplay reservations ends -->

                <!-- diplay reservations confermee starts -->
                <div class="users-table-container text-white">
                    <h2 class="section-title">Reservations <span class="text-success">confermee</span></h2>
                    <p class="user-count">Total Reservations Confermee: <span
                            class="badge badge-pill badge-primary"><?php echo $Nbr_reservation_Confirmee; ?></span></p>
                    <table class="users-table table table-striped table-bordered text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>Client</th>
                                <th>vehicule</th>
                                <th>dateDebut</th>
                                <th>dateFin</th>
                                <th>lieuPriseCharge</th>
                                <th>lieuRetour</th>
                                <th>Date de Reservation</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($statistique_reservation_Confirmee)) {
                                foreach ($statistique_reservation_Confirmee as $index => $reservation) { ?>
                                    <tr>
                                        <td><?= $reservation['username'] ?></td>
                                        <td><?= $reservation['marque']; ?>         <?= $reservation['modele']; ?></td>
                                        <td><?= $reservation['dateDebut']; ?></td>
                                        <td><?= $reservation['dateFin']; ?></td>
                                        <td><?= $reservation['lieuPriseCharge']; ?></td>
                                        <td><?= $reservation['lieuRetour']; ?></td>
                                        <td class="text-center"><?= $reservation['dateCreation']; ?></td>
                                        <td><span class="badge badge-success p-2"><?= $reservation['statut']; ?></span></td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr>
                                        <td colspan='3' class='no-data text-center'>No users found</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- diplay reservations confermee ends -->

                <!-- diplay reservations encours starts -->
                <div class="users-table-container text-white">
                    <h2 class="section-title">Reservations <span class="text-warning">encours</span></h2>
                    <p class="user-count">Total Reservations encours: <span
                            class="badge badge-pill badge-primary"><?php echo $Nbr_reservation_en_cours; ?></span></p>
                    <table class="users-table table table-striped table-bordered text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>Client</th>
                                <th>vehicule</th>
                                <th>dateDebut</th>
                                <th>dateFin</th>
                                <th>lieuPriseCharge</th>
                                <th>lieuRetour</th>
                                <th>Date de Reservation</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($statistique_reservation_en_cours)) {
                                foreach ($statistique_reservation_en_cours as $index => $reservation) { ?>
                                    <tr>
                                        <td><?= $reservation['username'] ?></td>
                                        <td><?= $reservation['marque']; ?>         <?= $reservation['modele']; ?></td>
                                        <td><?= $reservation['dateDebut']; ?></td>
                                        <td><?= $reservation['dateFin']; ?></td>
                                        <td><?= $reservation['lieuPriseCharge']; ?></td>
                                        <td><?= $reservation['lieuRetour']; ?></td>
                                        <td class="text-center"><?= $reservation['dateCreation']; ?></td>
                                        <td><span class="badge badge-warning p-2"><?= $reservation['statut']; ?></span></td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr>
                                        <td colspan='3' class='no-data text-center'>No users found</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- diplay reservations encours ends -->

                <!-- diplay reservations Annuler starts -->
                <div class="users-table-container text-white">
                    <h2 class="section-title">Reservations <span class="text-danger">Annuler</span></h2>
                    <p class="user-count">Total Reservations annuler: <span
                            class="badge badge-pill badge-primary"><?php echo $Nbr_reservation_annuler; ?></span></p>
                    <table class="users-table table table-striped table-bordered text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>Client</th>
                                <th>vehicule</th>
                                <th>dateDebut</th>
                                <th>dateFin</th>
                                <th>lieuPriseCharge</th>
                                <th>lieuRetour</th>
                                <th>Date de Reservation</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($statistique_reservation_annuler)) {
                                foreach ($statistique_reservation_annuler as $index => $reservation) { ?>
                                    <tr>
                                        <td><?= $reservation['username'] ?></td>
                                        <td><?= $reservation['marque']; ?>         <?= $reservation['modele']; ?></td>
                                        <td><?= $reservation['dateDebut']; ?></td>
                                        <td><?= $reservation['dateFin']; ?></td>
                                        <td><?= $reservation['lieuPriseCharge']; ?></td>
                                        <td><?= $reservation['lieuRetour']; ?></td>
                                        <td class="text-center"><?= $reservation['dateCreation']; ?></td>
                                        <td><span class="badge badge-danger p-2"><?= $reservation['statut']; ?></span></td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr>
                                        <td colspan='3' class='no-data text-center'>No users found</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- diplay reservations Annuler ends -->





                <!-- diplay Avis starts -->
                <div class="users-table-container text-white">
                    <h2 class="section-title">Avis</h2>
                    <p class="user-count">Total Avis: <span
                            class="badge badge-pill badge-primary"><?php echo $Nbr_avis; ?></span></p>
                    <table class="users-table table table-striped table-bordered text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>vehicule</th>
                                <th>client</th>
                                <th>contenu</th>
                                <th>note</th>
                                <th class="text-center">date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($statistique_avis)) {
                                foreach ($statistique_avis as $avis) { ?>
                                    <?php if ($avis['estSupprime'] == 0): ?>
                                        <tr>
                                            <td><?= $avis['marque']; ?>             <?= $avis['modele']; ?></td>
                                            <td><?= $avis['username']; ?></td>
                                            <td><?= $avis['contenu']; ?></td>
                                            <td><?php for ($i = 0; $i < $avis['note']; $i++)
                                                echo '<i class="fas fa-star"></i>'; ?></td>
                                            <td class="text-center"><?= $avis['date']; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php }
                            } else {
                                echo "<tr>
                                        <td colspan='3' class='no-data text-center'>No users found</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- diplay reservations ends -->

            </div>
        </div>
    </div>

</body>

</html>