
<?php

    include("PHP/DB.php");
    session_start();

    if (!isset($_SESSION['username']))
        echo "<script> window.location.href = 'login.php'; </script>";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="post">
            <p>Nom d'utilisateur</p>
            <input type="text" name="username" id="" value="<?php echo $_SESSION['username']; ?>">
            <p>Mot de passe</p>
            <input type="password" name="password">
            <p>Confirmez le mot de passe</p>
            <input type="password" name="repeatpassword">

            <input type="submit" value="Mettre à jour" name="submit">
        </form>

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
                    if ($password == $repeatPassword ) {

                        $prep = $DB->prepare("UPDATE membre SET login = ? WHERE login = ? AND pass = ?");
                        $prep->execute(array($username, $_SESSION['username'], $password));
                        $prep = $prep->fetch();

                        $_SESSION['username'] = $username;

                        echo "<script> window.location.href = 'user.php'; </script>";

                    } else echo "Les mots de passes ne correspondent pas";

                } else echo "Tout les champs ne sont pas remplies";
            }


        ?>
    </body>
</html>