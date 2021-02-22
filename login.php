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
        <title>Connexion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles/css-login/tether/tether.min.css">
        <link rel="stylesheet" href="styles/css-login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles/css-login/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="styles/css-login/bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="styles/css-login/dropdown/css/style.css">
        <link rel="stylesheet" href="styles/css-login/formstyler/jquery.formstyler.css">
        <link rel="stylesheet" href="styles/css-login/formstyler/jquery.formstyler.theme.css">
        <link rel="stylesheet" href="styles/css-login/datepicker/jquery.datetimepicker.min.css">
        <link rel="stylesheet" href="styles/css-login/socicon/css/styles.css">
        <link rel="stylesheet" href="styles/css-login/theme/css/style.css">
        <link rel="preload" as="style" href="/styles/css-login/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="styles/css-login/mobirise/css/mbr-additional.css" type="text/css">
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
    <section class="menu cid-s48OLK6784" once="menu" id="menu1-p">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="login.php">
                        <img src="styles/css-login/images/tlchargement-121x121.png" alt="Mobirise" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-primary display-7" href="index.php">PassionFroid</a></span>
            </div>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true"></a><div class="dropdown-menu"><a class="text-black dropdown-item display-4" href="https://mobirise.com">New Item</a><a class="text-black dropdown-item display-4" href="#" aria-expanded="false">New Item</a></div></li></ul>
                
                
            </div>
        </div>
    </nav>

</section>

<section class="form7 cid-spLuJb7qrp" id="form7-s">
    
    
    <div class="container-fluid">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>CONNEXION</strong></h3>
            
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="6GhFLm0rLpMV2nRmDPvlHmxO4MQElDHM+w3XeX6KXurb2rVi2Nkm4skL/8+iaj0WRsMzFk+bHjyH3Tl8NbiT67+4q/NTIk7ZnI6AypiH7yI68qJLqMgKviTw3M5JlLsm">
                    <p class="mbr-text mbr-fonts-style align-center mb-4 display-7">Connectez vous à votre compte en remplissant les informations demandées</p>
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Connexion en cour...!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oups...! On a un problème !</div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="name">
                            <input type="text" name="mail" placeholder="Adresse e-mail" data-form-field="name" class="form-control" value="" id="name-form7-s">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="passwrd">
                            <input type="password" name="password" placeholder="Mot de passe" data-form-field="passwrd" class="form-control" value="" id="password-form7-s">
                        </div>
                        
                        <div class="col-auto mbr-section-btn align-center">
                            <button type="submit" class="btn btn-primary display-4">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="footer7 cid-spLuKhPX1T" once="footers" id="footer7-t">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    © Copyright 2025 Mobirise - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/j" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;">Designed with Mobirise <a href="https://mobirise.site/u" style="color:#aaa;">website</a> theme</p></section><script src="styles/css-login/web/assets/jquery/jquery.min.js"></script>  <script src="styles/css-login/popper/popper.min.js"></script>  <script src="styles/css-login/tether/tether.min.js"></script>  <script src="styles/css-login/bootstrap/js/bootstrap.min.js"></script>  <script src="styles/css-login/smoothscroll/smooth-scroll.js"></script>  <script src="styles/css-login/dropdown/js/nav-dropdown.js"></script>  <script src="styles/css-login/dropdown/js/navbar-dropdown.js"></script>  <script src="styles/css-login/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="styles/css-login/formstyler/jquery.formstyler.js"></script>  <script src="styles/css-login/formstyler/jquery.formstyler.min.js"></script>  <script src="styles/css-login/datepicker/jquery.datetimepicker.full.js"></script>  <script src="styles/css-login/theme/js/script.js"></script>  <script src="styles/css-login/formoid/formoid.min.js"></script>  

    </body>
</html>