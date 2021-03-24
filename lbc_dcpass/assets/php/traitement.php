<?php

require_once "../../function.php";
session_start();

$saveAnnonce   = $_POST["saveAnnonce"];
$deleteAnnonce = $_POST['deleteAnnonce'];
$idAnnonce     = $_POST['idAnnonce'];


$db = getDatabaseConnection();


if (isset($saveAnnonce) && $saveAnnonce == "addAnnonce") {
  $title       = $_POST["title"];
  $description = $_POST["description"];
  $price       = $_POST["price"];
  $category    = $_POST["category"];
  $user        = $_POST["user"];

  function annonceExiste($title)
  {
    $db          = getDatabaseConnection();
    $req         = $db->query("SELECT title FROM annonce");
    $annonces    = $req->fetchAll(PDO::FETCH_ASSOC);
    $titleExiste = false;
    foreach ($annonces as $annonce) {
      if ($title == $annonce["title"]) {
        $titleExiste = true;
      }
    }

    return $titleExiste;

  }

  if (annonceExiste($title)) {
    $message   = "L'annonce ".$title." existe déjà";
    $codeError = "2";
    header("Location: ../../index.php");
  } else {
    if (isset($title) && ! empty($title)) {
      if (isset($description) && ! empty($description)) {
        if (isset($price) && !empty($price)) {
          $req = $db->prepare(
            "INSERT INTO annonce (title, description, price, id_category, id_user ) VALUES (:title, :description, :price, :category, :user)"
          );
          $req->bindValue('title', $title, PDO::PARAM_STR);
          $req->bindValue('description', $description, PDO::PARAM_STR);
          $req->bindValue('price', $price, PDO::PARAM_STR);
          $req->bindValue('category', $category, PDO::PARAM_INT);
          $req->bindValue('user', $user, PDO::PARAM_INT);

          $req->execute();

          $message   = "Annonce enregistré";
          $codeError = "0";
          header("Location: ../../index.php");
        }else {
          $message   = "Veuillez entrer un prix";
          $codeError = "6";
          header("Location: ../../addAnnonce.php");
        }
      } else {
        $message   = "Veuillez entrer une description";
        $codeError = "4";
        header("Location: ../../addAnnonce.php");
      }
    } else {
      $message   = "Veuillez entrer un titre";
      $codeError = "3";
      header("Location: ../../addAnnonce.php");
    }
  }

} elseif (isset($deleteAnnonce) && $deleteAnnonce == "deleteThis" && isset($idAnnonce) && is_numeric($idAnnonce)) {
  $req = $db->prepare("DELETE FROM annonce WHERE id=:id");
  $req->bindValue(":id", $idAnnonce, PDO::PARAM_INT);
  $req->execute();
  $message   = "Annonce supprimé";
  $codeError = "5";
  header("Location: ../../index.php");
} else {
  $message   = "Une erreur est survenu veuillez recommencer !";
  $codeError = "1";
  header("Location: ../../index.php");
}

$_SESSION['status']  = $codeError;
$_SESSION['message'] = $message;

if ($codeError == 1 || $codeError == 2 || $codeError == 3 || $codeError == 4 || $codeError == 6) {
  $_SESSION['erreur'] = true;
} else {
  $_SESSION['erreur'] = false;
}
