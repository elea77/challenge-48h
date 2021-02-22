<?php require_once('base/init.php'); ?>

<?php


if( userConnect() ){
    $id_user = $_SESSION['user']['id_user'];
}


//------------------------------------------------------------
if( $_POST ){


    $r = $bdd->prepare("SELECT * FROM user WHERE mail = '$_POST[mail]' ");
    $r -> execute();
    //Si il y a une correpondance d'un mail dans la table 'user', $r renverra '1' ligne de résultat
    if( $r->rowCount() >= 1){

        $user = $r->fetch(PDO::FETCH_ASSOC);

        if( $_POST['password'] == $user['password'] ){

            $_SESSION['user']['id_user'] = $user['id_user'];
            $_SESSION['user']['mail'] = $user['mail'];
            $_SESSION['user']['password'] = $user['password'];
            $_SESSION['user']['firstname'] = $user['firstname'];
            $_SESSION['user']['lastname'] = $user['lastname'];
            $_SESSION['user']['statut'] = $user['statut'];

            //redirection vers le dashboard :
            header('location:dashboard.php');
        }
        else{
            $connex .= '<div style="color:red;">Mot de passe incorrect</div>';
        }
    }
    else{
        $connex .= '<div style="color:red;">Adresse mail non valide</div>';
    }
}

?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>PassionFroid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- logos -->
        <link rel="icon" type="image/png" href="assets/img/logo.png" />
        <!-- fonts -->
        
        <!-- Bootsrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- style -->
        <link rel="stylesheet" href="styles/index.css">
    </head>
    <body>
        <div class="container">
            <div class="form">
                <?php echo $connex; ?>
                <form method="post" action="">
                    <h1>Connexion</h1><br><br>
                    <label for="mail">Adresse mail</label><br>
                    <input type="email" name="mail"><br><br> 

                    <label for="password">Mot de passe</label><br>
                    <input type="password" name="password"><br><br><br>

                    <input type="submit" name="" value="Se connecter"><br>
                </form>
            </div>
        </div>
    </body>
</html>