<?php session_start();
include("PHP/DB.php");

if(!isset($_SESSION['UploadError'])){
    $_SESSION['UploadError'] = "";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css">
    <title>Enregistrer un livre</title>
</head>

<?php include ('menu.php'); ?>

<body>

    <div class="add_book">

        <?php echo $_SESSION['UploadError']; 
    $_SESSION['UploadError'] = ""?>

        <h1>Ajoutez un ouvrage</h1>

        <form enctype="multipart/form-data" action="Upload.php" method="POST" class="form">
            <div>
                <p>Titre : </p>
                <input type="text" name="title" require="">
            </div>

            <div>
                <p>Auteur : </p>
                <input type="text" name="author" require="">
            </div>

            <div>
                <p>Date : </p>
                <input type="text" name="date" require="">
            </div>

            <div>
                <p>Synopsis : </p>
                <textarea name="synopsis" cols="30" rows="10" require=""></textarea>
            </div>

            <div>
                <!-- On limite le fichier à 100Ko -->
                Fichier : <input type="file" name="avatar">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000">

            </div>

            <div>
                <button type="submit" name="submit">Enregister</button>
            </div>

        </form>

        </form>

    </div>

</body>

</html>