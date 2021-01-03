<?php include("PHP/DB.php");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registe —</title>
    </head>

    <body>

        <h1>Ajoutez un ouvrage</h1>
        <form method="POST">
            <div>
                <p>Titre</p>
                <input type="text" name="title" require="">
            </div>

            <div>
                <p>Auteur</p>
                <input type="text" name="author" require="">
            </div>

            <div>
                <p>Synopsis</p>
                <textarea name="synopsis" cols="30" rows="10" require=""></textarea>
            </div>

            <div>
                <button type="submit" name="submit">Enregister</button>
            </div>

        </form>

        <?php

        if (isset($_POST["submit"])) {
            if (!empty($_POST["author"]) && !empty($_POST["synopsis"]) && !empty($_POST["title"])) {
                $prep = $DB->prepare("INSERT INTO livre(auteur, resumer, titre) VALUE(?, ?, ?)");
                $prep->execute(
                    array(
                        $_POST["author"],
                        $_POST["synopsis"],
                        $_POST["title"],
                    )
                );

            } else echo("Remplis moi le cul salope");

        }

        ?>

    </body>

</html>