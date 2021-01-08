<?php

    try {
        // Nouvel objet PDO pour initialiser la connection à la BDD
        $DB = new PDO('mysql:host=192.168.65.138; dbname=TdFinal_Lienard_Martel', "website", "website");
    }

    catch (PDOException $e) {
        echo $e;
    }

?>

<?php 
    $_GET['BookName'] = "Akira" ;
    $BookResult = $DB->query("SELECT * FROM livre WHERE BookName = '".$_GET['BookName']."' ");
    print_r("SELECT * FROM livre WHERE BookName = '".$_GET['BookName']."' ");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
</head>

<body>
    <div class="page">

        <?php 
            while ( $BookData = $BookResult->fetch()){
        ?>

        <div class="img">
            <img class="Affiche" src="Affiche/<?php $BookData['BookName']; ?>/Affiche.jpeg" alt="Affiche">
        </div>
        <div class="desc">

            <?php 
            
            } 
            
            ?>

            <div class="espace40px"></div>

            <?php
                echo($donnees['auteur']);
                echo($donnees['resumer']);
            ?>
        </div>


    </div>

</body>

</html>