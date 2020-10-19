<?php 

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$message = $_POST['message'];

echo "Bonjour " . $nom . " / " . $prenom . " / " . $email . " / " . $tel . " / " . $message;

?>