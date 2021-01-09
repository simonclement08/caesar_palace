<?php

function connexion_bd(){

    try{
        // On se connecte à MySQL
        $bdd = new PDO("mysql:host=localhost;dbname=poker;charset=utf8", "", "");
    }

    catch(Exception $e){
        // En cas d'erreur, on affiche un message et on arrête tout
        //die('Erreur : '.$e->getMessage());
        ?>
        <script>alert("Erreur lors de la connexion à la base de données");</script>
        <?php
    }

    return $bdd;
}
