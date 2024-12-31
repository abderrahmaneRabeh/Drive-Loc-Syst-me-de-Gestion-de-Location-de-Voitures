<?php
require_once '../Models/Sinscrire.php';
require_once '../Models/user.php';

class SinscrireController extends Sinscrire
{
    public function RegisterController($nom, $email, $pw, $ConfirmPw)
    {
        $result = $this->Register($nom, $email, $pw, $ConfirmPw);
        if ($result) {
            session_start();

            $user = new User();
            $utilisateurSelectioner = $user->get_User($email);

            $_SESSION['user'] = $utilisateurSelectioner;
            $_SESSION['role'] = $utilisateurSelectioner['role_id'];
            header("Location: ../index.php");
            exit;
        } else {
            header("Location: ../index.php");
            exit;
        }
    }

}

// traitement de S'inscrire

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $pw = $_POST['motDePasse'];
    $ConfirmPw = $_POST['confirmerMotDePasse'];

    $AuthController = new SinscrireController();
    $AuthController->RegisterController($nom, $email, $pw, $ConfirmPw);

}