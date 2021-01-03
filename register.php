<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type='text/css' href="http://localhost/projetfinalmysql/style.css">
        <title>Inscription</title>
    </head>

    <body>
        <form method="POST" action="register.php" class="form">
            <p>Votre nom d'utilisateur : </p>
            <input type="text" name="username">

            <p>Votre mot de passe : </p>
            <input type="password" name="password">

            <p>Tapez à nouveau votre mot de passe : </p>
            <input type="password" name="repeatpassword">

            <p></p>

            <div>
                <input type="submit" value="S'inscrire" name="submit">
            </div>
        </form>
    </body>

</html>

<?php

    // Lorsque l'utilisateur clique sur le boutton d'envois
    if (isset($_POST["submit"])) {

        // Convertir les entités HTML pour eviter les conflits
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        $repeatPassword = htmlentities($_POST['repeatpassword']);

        // Si tout les champs sont remplis
        if ($username && $password && $repeatPassword) {
            // Si le mot de passe et la confirmation sont identiques
            if ($password == $repeatPassword)
            {
                // Nouvel objet PDO pour initialiser la connection à la BDD
                $DB = new PDO('mysql:host=localhost; dbname=projetfinal', "root", "");
                // Préparation de la query
                $prep = $DB -> prepare('INSERT INTO membre(login, pass) VALUE(?,?)');
                // Inclusions des arguments de la query
                $prep->execute(array($username, $password));

                die('<p>Inscripion terminée, <a href="login.php">retour à la page de connection</a>.</p>');

            } else echo '<div class="erreur"><strong> Les deux mots de passe doivent être identiques. </strong></div>';

        } else echo '<div class="erreur"><strong> Veuillez remplir tout les champs. </strong></div>';

    }

?>