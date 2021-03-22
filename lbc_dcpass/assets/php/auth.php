<?php
require_once "../../function.php";
session_start();
$db = getDatabaseConnection();

$password    = $_POST['password'];
$email       = $_POST['email'];
$btn_connect = $_POST['btn-connect'];

if (isset($btn_connect) && $btn_connect == "connect") {
    if (isset($email) && ! empty($email)) {
        if (isset($password) && ! empty($password)) {
            $req = $db->prepare(
                "SELECT * FROM user WHERE email = :email AND password = :password OR pseudo = :pseudo AND password = :password"
            );
            $req->bindValue(":email", $email, PDO::PARAM_STR);
            $req->bindValue(":password", $password, PDO::PARAM_STR);
            $req->bindValue(":pseudo", $email, PDO::PARAM_STR);

            $req->execute();
            $user = $req->fetch();
            if ( ! empty($user['email']) && ! empty($user['pseudo']) && ! empty($user['id'])) {
                session_start();
                $_SESSION['id']        = $user['id'];
                $_SESSION['firstname'] = $user["firstname"];
                $_SESSION['email']     = $user["email"];
                $_SESSION['pseudo']    = $user['pseudo'];

                $message   = "Vous êtes bien connecté";
                $codeError = 0;
                header('Location: ../../index.php');
            } else {
                $message   = "Votre mot de passe ou votre identifiant est invalide";
                $codeError = 4;
                header('Location: ../../login.php');
            }

        } else {
            $message   = "Veuillez entrer votre mot de passe";
            $codeError = 3;
            header('Location: ../../login.php');
        }
    } else {
        $message   = "Veuillez entrer votre adresse email";
        $codeError = 2;
        header('Location: ../../login.php');
    }
} else {
    $message   = "Une erreur est survenu veuillez recommencer !";
    $codeError = 1;
    header('Location: ../../login.php');
}
$_SESSION['message'] = $message;

if ($codeError == 1 || $codeError == 2 || $codeError == 3 || $codeError == 4) {
    $_SESSION['erreur'] = true;
} else {
    $_SESSION['erreur'] = false;
}
