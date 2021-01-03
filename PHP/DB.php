<?php

    try {
        // Nouvel objet PDO pour initialiser la connection à la BDD
        $DB = new PDO('mysql:host=localhost; dbname=projetfinal', "root", "");
        return $DB;

    } catch (\Throwable $th) {
        echo $th;
    }

?>
