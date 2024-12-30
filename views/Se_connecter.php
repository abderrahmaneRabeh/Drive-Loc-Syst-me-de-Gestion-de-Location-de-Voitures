<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DRIVE-LOC - Connexion</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../assets/img/vendor-7.png" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Rubik', sans-serif;
        }

        .login-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .login-container h1 {
            font-family: 'Oswald', sans-serif;
            color: #002b5b;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #002b5b;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: #ff6700;
            box-shadow: 0 0 0 0.2rem rgba(255, 103, 0, 0.25);
        }

        .btn-primary {
            background-color: #002b5b;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff6700;
            color: white;
        }

        .text-link {
            color: #ff6700;
            text-decoration: none;
            font-weight: bold;
        }

        .text-link:hover {
            text-decoration: underline;
        }

        .btn-home {
            background-color: #ff6700;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 20px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-home:hover {
            background-color: #002b5b;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Button to return to home -->
        <a href="../index.php">
            <button class="btn btn-home">Retour à l'accueil</button>
        </a>

        <h1>Connexion</h1>
        <p class="text-center">Vous n'avez pas de compte ? <a href="Inscription.php"
                class="text-link">Inscrivez-vous</a></p>
        <form method="post" action="TraiterConnexion.php">
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" required>
            </div>
            <div class="mb-3">
                <label for="MotDePasse" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="MotDePasse" name="MotDePasse" required>
            </div>
            <div class="text-center">
                <button class="btn btn-primary w-100" type="submit">Se connecter</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>