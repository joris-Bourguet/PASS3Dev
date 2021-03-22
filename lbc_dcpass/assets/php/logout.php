<?php
session_start();
if (isset($_SESSION['id'])) {
    session_destroy();
    session_start();
    $_SESSION['message'] = "Vous êtes déconnecté !";
    $_SESSION['erreur'] = false;
} else {
    $_SESSION['message'] = "Une erreur est survenue lors de la déconnexion !";
    $_SESSION['erreur'] = true;
}
header('Location: ../../index.php');
