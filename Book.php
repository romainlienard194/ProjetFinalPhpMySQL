<?php

    try {
        // Nouvel objet PDO pour initialiser la connection à la BDD
        $DB = new PDO('mysql:host=192.168.65.138; dbname=TdFinal_Lienard_Martel', "website", "website");
        $CustomBookResult = $DB->query("SELECT * FROM `livre` WHERE `id_livre` = '".$_GET['Bookid']."'");
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

    <div class="Book">

<?php

    while ($CustomBookData = $CustomBookResult->fetch()){  

?>

    <div class="Book">
        <p><?php echo $CustomBookData["auteur"]; ?></p>
        <p><?php echo $CustomBookData['Date']; ?></p>
        <p><a href="Book.php?Bookid=<?php echo $_POST['id_livre']=$CustomBookData["id_livre"]; ?>"><?php echo $CustomBookData["titre"]; ?>
        </p>
        <p><img class="Book_Img" src="Affiche/<?php echo $CustomBookData["id_livre"]; ?>.jpg" alt="Book"></a></p>
        <p class="Synopsis"><?php echo $CustomBookData ['resumer']; ?> </p>

    </div>

<?php

}

    $CustomBookResult->closeCursor();

?>

</body>

</html>