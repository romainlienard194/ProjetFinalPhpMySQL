<?php

    try {
        // Nouvel objet PDO pour initialiser la connection à la BDD
        $DB = new PDO('mysql:host=192.168.65.138; dbname=TdFinal_Lienard_Martel', "website", "website");

    }catch( PDOException $e ) {
        echo $e->getMessage();
    }

?>
