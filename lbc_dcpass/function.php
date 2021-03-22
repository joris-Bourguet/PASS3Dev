<?php


/*

    * Fonction de connexion à notre base de données.

    * @return une connexion active

*/

function getDatabaseConnection()
{

    // On va essayer d'établir une connexion à la base de données

    try {

        // Création d'un objet de connexion à notre DB (interface)

        $db = new PDO(
            'mysql:host=localhost;dbname=dcpass_php',
            'root',
            '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        return $db;


        // Si on y arrive pas, on capture l'exception

    } catch (Exception $e) {

        // Tuer le programme avec un message d'erreur

        die("Erreur SQL : $e->getMessage()");

    }

}
