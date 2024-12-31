<?php

function Check_Home_Page()
{
    if (!isset($_SESSION['user'])) {
        header("Location: ./views/Se_connecter.php?msg=veuillez vous connecter pour accéder à la page");
        exit;
    }
}
function Check_List_Voiture_Page()
{
    if (!isset($_SESSION['user'])) {
        header("Location: ./Se_connecter.php?msg=veuillez vous connecter pour accéder à la page");
        exit;
    }
}

function Check_auth_User()
{
    if (isset($_SESSION['user'])) {
        header("Location: ../index.php");
        exit;
    }
}