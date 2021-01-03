<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <p>Votre nom d'utilisateur : </p>
        <input type="text" name="username">

        <p>Votre mot de passe : </p>
        <input type="password" name="password">

        <p></p>

        <div>
            <input type="submit" value="Se connecter" name="submit">
        </div>
    </form>
</body>

</html>

<?php
    session_start();

    if(isset($_POST["submit"])) {

        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);

        if((!empty($_POST['password'])) && (!empty($_POST['username']))){
            // Nouvel objet PDO pour initialiser la connection à la BDD
            $DB = new PDO('mysql:host=localhost; dbname=projetfinal', "root", "");
            // Préparation de la query
            $prep = $DB->prepare("SELECT * FROM membre WHERE login = ? AND pass = ?");
            // Inclusions des arguments de la query
            $prep->execute(array($username, $password));
            $prep = $prep->fetch();

            if ($prep) {
                $_SESSION['username'] = $prep['login'];
                header('location:membre.php');
            } else echo "Nom d'utilisateur ou mot de passe incorrect.";


        } else echo 'Veuillez saisir tous les champs.';
    }


?>