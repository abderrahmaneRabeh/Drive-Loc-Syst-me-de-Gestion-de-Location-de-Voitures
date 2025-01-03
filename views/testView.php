<?php
session_start();
require_once '../middleware/Check_user_connexion.php';
require_once '../Controllers/ListVoitureController.php';

Check_List_Voiture_Page();
$ListVoitureController = new ListVoitureController();
$listVoiture = $ListVoitureController->TestViewVehicule()



    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DRIVE-LOC -- List Voitures Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../assets/img/vendor-7.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <style>
        .list_voiture {
            & img {
                width: 100%;
                height: 200px;
            }

            & .list_link {
                text-decoration: none;
            }
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+212679997258</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>rabehlife144@gmail.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="../index.php" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1"><span class="text-white">DRIVE-</span>LOC</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="../index.php" class="nav-item nav-link">Accueil</a>
                        <a href="./List_Voitures.php" class="nav-item active nav-link">List Voitures</a>
                        <a href="./List_VoituresCategory.php" class="nav-item nav-link">Categories</a>
                        <?php if (isset($_SESSION['user']) && $_SESSION['role'] == 2): ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <?= $_SESSION['user']['username']; ?>
                                </a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="../Controllers/Lougout.php" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                    <a href="../dashboard/client/reservation.php" class="dropdown-item">client Dashboard</a>
                                </div>
                            </div>
                        <?php elseif (isset($_SESSION['user']) && $_SESSION['role'] == 1): ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <?= $_SESSION['user']['username']; ?>
                                </a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="../Controllers/Lougout.php" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                    <a href="../dashboard/admin/voiture.php" class="dropdown-item">admin Dashboard</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <div class="fas fa-user"></div>
                                </a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="./views/Sinscrire.php" class="dropdown-item">S'inscrire</a>
                                    <a href="./views/Se_connecter.php" class="dropdown-item">Se connecter</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mt-5">
        <h1 class="display-3 text-uppercase text-white mb-3">List Voitures</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">List Voitures</h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Rent A Car Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Trouvez votre voiture</h1>
            <div class="row">
                <?php foreach ($listVoiture as $voiture): ?>
                    <div class="col-lg-4 col-md-6 mb-2" id="<?= $voiture['id_vehivule'] ?>">
                        <div class="rent-item mb-4 list_voiture">
                            <img class="img-fluid mb-4" src="<?= $voiture['image_url'] ?>" alt="<?= $voiture['modele'] ?>">
                            <a href="./Voiture_details.php?id=<?= $voiture['id_vehivule'] ?>" class="list_link">
                                <h4 class="text-uppercase mb-4" style="cursor: pointer;"><?= $voiture['marque'] ?>
                                    <?= $voiture['modele'] ?>
                                </h4>
                            </a>
                            <div class="d-flex justify-content-center mb-4">
                                <div class="px-2">
                                    <i class="fa fa-car text-primary mr-1"></i>
                                    <span><?= $voiture['couleur'] ?></span>
                                </div>
                                <div class="px-2 border-left border-right">
                                    <i class="fa fa-cogs text-primary mr-1"></i>
                                    <span><?= $voiture['transmission'] ?></span>
                                </div>
                                <div class="px-2">
                                    <i class="fa fa-road text-primary mr-1"></i>
                                    <span><?= $voiture['kilometrage'] ?>Km</span>
                                </div>
                            </div>
                            <a class="btn btn-primary px-3"
                                href="./Voiture_details.php?id=<?= $voiture['id_vehivule'] ?>">$<?= $voiture['prixJournalier'] ?>/jour</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <!-- Rent A Car End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Contact Nous</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>Safi, Nouvelle ville</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+212 345 67890</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>rabehlife144@gmail.com</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Liens vers Autres</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Acceuil</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Liste des
                        voitures</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Category</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>S'inscrire</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Se connecter</a>
                    <a class="text-body" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Contact</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Donner Message</h4>
                <p class="mb-4">Envoyez-nous un message et nous vous contacterons dans les plus bref delai</p>
                <div class="w-100 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control bg-dark border-dark" style="padding: 25px;"
                            placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-uppercase px-3">S'inscrire</button>
                        </div>
                    </div>
                </div>
                <i>Restez connecter</i>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">CodeChogun</a>. Tout les droits reserve.</p>
        <p class="m-0 text-center text-body">Crée par <a href="https://htmlcodex.com">Abderrahmane Rabeh</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
    <script>
        let input = document.querySelector('input[name="search"]');

        let clearBtn = document.getElementById('clearBtn');

        clearBtn.addEventListener('click', () => {
            console.log("clicked");


            input.value = '';
            window.location.href = 'http://drive_loc-gestion_vehicules.test/views/List_Voitures.php';
        });

    </script>
</body>

</html>