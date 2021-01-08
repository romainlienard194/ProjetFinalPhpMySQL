<?php session_start();
    $DB = new PDO('mysql:host=192.168.65.138; dbname=TdFinal_Lienard_Martel', "website", "website");
    $_SESSION['UploadError'] = "";

    if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['date']) && isset($_POST['synopsis']) && isset($_FILES['avatar'])){



        $dossier = 'Affiche/';
        $fichier = basename($_FILES['avatar']['name']);
        $taille_maxi = 100000;
        $taille = filesize($_FILES['avatar']['tmp_name']);
        $extensions = array('.jpg', '.jpeg');
        $extension = strrchr($_FILES['avatar']['name'], '.'); 
        //Début des vérifications de sécurité...

        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $_SESSION['UploadError'] = "Seuls les fichiers .jpg et .jpeg sont autorisés";
            $erreur = "Seuls les fichiers .jpg et .jpeg sont autorisés";
            header('location:livre.php'); 
        }

        if($taille>$taille_maxi)
        {
            $_SESSION['UploadError'] = "Le fichier est trop gros...";
            $erreur = "Le fichier est trop gros...";
            header('location:livre.php');
        }

        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                $prep = $DB->query("INSERT INTO `livre`(`titre`, `Date`, `auteur`, `resumer`) VALUES ('".$_POST["title"]."', '".$_POST["date"]."', '".$_POST["author"]."', \"".$_POST["synopsis"]."\")");

                $newbook = $DB->query("SELECT id_livre FROM livre WHERE titre ='".$_POST["title"]."'");
                $newbookdata = $newbook->fetch();

                rename($dossier . $fichier , $dossier . $newbookdata['id_livre'] . ".jpg");

                $_SESSION['UploadError'] = "Livre Upload avec succès";
                header('location:livre.php');
            }

            //Sinon (la fonction renvoie FALSE).
            else 
            {
                $_SESSION['UploadError'] = "Le fichier n'as pas pu être upload";
                header('location:livre.php');
            }
        }
        else{
            $_SESSION['UploadError'] = "error 404 fuck yeah";
                header('location:livre.php');
        }
    }
    else{
    $_SESSION['UploadError'] = "Veuillez remplir tout les champs 2";
    header('location:livre.php');
    }        
?>