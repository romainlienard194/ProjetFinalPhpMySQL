    <?php
            

        try {
            // Nouvel objet PDO pour initialiser la connection à la BDD
            $DB = new PDO('mysql:host=192.168.65.138; dbname=TdFinal_Lienard_Martel', "website", "website");
        }

        catch (PDOException $e) {
            echo $e;
        }

        //Supprimer un ouvrage
        if(isset($_POST['delete'])){
            $DeleteBook = $DB->query("DELETE FROM livre WHERE id_livre = '".$_POST['delete']."' ");
            echo 'Ouvrage supprimé avec succès';
        }

        $BookList = $DB->query("SELECT * FROM livre");

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="site.css">
        <title>Book List</title>
    </head>

    <body>

    <?php 
        
        include ('menu.php');

        while ( $BookListData = $BookList->fetch() )   
        {  

    ?>

        <!--Supprimer un ouvrage-->
        <div class="DeleteBookList">
            <p><?php echo $BookListData['titre']?> - <b><?php echo $BookListData['Date']?></b></p>
            <p><?php echo $BookListData['auteur']?></p>
            <p><img class="Book_Img" src="Affiche/<?php echo $BookListData["id_livre"] ?>.jpg" alt="Book"></p>
            <form action="" method="post"><button type="submit" value="<?php echo $BookListData['id_livre']?>"
                    name="delete">Supprimer cet ouvrage</button></form>
        </div>


        <?php

        }
        $BookList->closeCursor();

    ?>

    </body>

    </html>