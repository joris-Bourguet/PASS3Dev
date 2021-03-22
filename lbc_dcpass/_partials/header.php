<?php
define("ABSPATH", "http://localhost/PSS3/Dev/lbc_dcpass/");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LeBonCoin_DCPass</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="<?= ABSPATH ?>assets/css/style.css">

</head>

<body>
<div class="jumbotron m-0">
    <img src="../img/logoSite.svg" height="200" width="800" alt="Logo de Leboncoin">
    <h1 class="display-4">LeBonCoin version DCpass</h1>
    <p class="lead">Ceci est le premier projet php connecté à une bdd que la dcprepa réalise.</p>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Le bon coin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addAnnonce.php">Ajouter une annonce</a>
            </li>
            <?php
            if (isset($_SESSION['id'])):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ABSPATH ?>assets/php/logout.php">Déconnexion
                        - <?= $_SESSION['pseudo']; ?></a>
                </li>
            <?php
            else:
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Se connecter</a>
                </li>
            <?php
            endif;
            ?>

        </ul>
        <form class="form-inline mr-5">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

