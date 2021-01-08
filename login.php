<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="site.css">
    <title>Connexion</title>
</head>

<body>
    <form method="POST">
        <div>
            <p>Votre nom d'utilisateur : </p>
            <input type="text" name="username">
        </div>

        <div>
            <p>Votre mot de passe : </p>
            <input type="password" name="password">
        </div>

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
            $DB = new PDO('mysql:host=192.168.65.138; dbname=TdFinal_Lienard_Martel', "website", "website");
            // Préparation de la query
            $prep = $DB->prepare("SELECT * FROM membre WHERE login = ? AND pass = ?");
            // Inclusions des arguments de la query
            $prep->execute(array($username, $password));
            $prep = $prep->fetch();

            if($prep) {
                $_SESSION['username'] = $prep['login'];
                header('location:accueil.php');
            } else echo "Nom d'utilisateur ou mot de passe incorrect.";


        } else echo 'Veuillez saisir tous les champs.';
    }


?>