<?php require_once('base/init.php'); ?>

<?php



if( !userConnect() ){
    header('location:login.php');
    exit(); 
}

if( userConnect() ){
    $id_user = $_SESSION['user']['id_user'];
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
            <h1>Dashboard admin</h1>
            <a href="login.php?action=deconnexion">Se deconnecter</a>

            
            <h3>Ajouter une image</h3>

            <form action="" method="post">

                
            
            </form>
        </div>
    </body>
</html>
