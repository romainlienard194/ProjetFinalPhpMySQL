<?php

    try {
        // Nouvel objet PDO pour initialiser la connection à la BDD
        $DB = new PDO('mysql:host=192.168.65.138; dbname=TdFinal_Lienard_Martel', "website", "website");
        $BookResult = $DB->query("SELECT * FROM livre");
    }

    catch (PDOException $e) {
        echo $e;
    }

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
    //Menu pour ajouter, supprimer ou accèder à la biblio
    include ('menu.php'); 
?>

    <div class="Books_List">

<?php

while ( $BookData = $BookResult->fetch() )   
 {  

?>

        <div class="Books_Icon">
            <p><?php echo $BookData["auteur"] ?></p>
            <p><a href="Book.php?Bookid=<?php echo $_POST['id_livre']=$BookData["id_livre"] ?>"><?php echo $BookData["titre"] ?>
                    - <?php echo $BookData['Date'] ?></p>
            <p><img class="Book_Img" src="Affiche/<?php echo $BookData["id_livre"] ?>.jpg" alt="Book"></a></p>

        </div>

        <?php

}

$BookResult->closeCursor();

?>

</body>

</html>