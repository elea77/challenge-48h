<?php require_once('base/init.php'); ?>

<?php


if( !userConnect() ){
    header('location:login.php');
    exit(); 
}

if( userConnect() ){
    $id_user = $_SESSION['user']['id_user'];
}


if( $_POST ) {
  
    $bdd->exec(" INSERT INTO image_info(name, type, with_product, with_human, institutional, format_img, credit, limited_rights, copyright, date_end_limited_rights, id_image) VALUES('$_POST[name]', '$_POST[type]', '$_POST[with_product]', '$_POST[with_human]', '$_POST[institutional]', '$_POST[format_img]', '$_POST[credit]', '$_POST[limited_rights]', '$_POST[copyright]', '$_POST[date_end_limited_rights]', '$_POST[id_image]') ");

    if($_POST['type'] == 'ambiance') {
        header('location:ambianceCat.php');
    }
    if($_POST['type'] == 'produit') {
        header('location:productCat.php');
    }
        
}

$prepare = $bdd->prepare("SELECT * FROM image");
$prepare -> execute();
$images = $prepare->fetchAll(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>PassionFroid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- logos & icones -->
        <link rel="icon" type="image/png" href="assets/img/logo.png" />
        <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
        <!-- fonts -->
        
        <!-- Bootsrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- style -->
        <link rel="stylesheet" href="styles/sidenav.css">
    </head>
    <body>

        <div class="panel">

            <div class="top">
                <a href=""><h2>Dashboard</h2></a>
            </div>

            <div class="menu">

                <div class="tab" style="margin-top: 25%;">
                    <a href="dashboard.php">
                        <span class="iconify" data-inline="false" data-icon="clarity:dashboard-line" style="font-size: 24px; color: white;"></span>
                        <h5>Dashboard</h5>
                    </a>
                </div>

                <div class="tab">
                    <a href="addImageInfo.php">
                    <span class="iconify" data-inline="false" data-icon="ic:outline-note-add" style="color: white; font-size: 24px;"></span>
                        <h5>Ajouter</h5>
                    </a>
                </div>

                <div class="tab">
                    <a href="ambianceCat.php">
                        <span class="iconify" data-inline="false" data-icon="openmoji:picture" style="font-size: 24px;"></span>
                        <h5>Photos ambiances</h5>
                    </a>
                </div>

                <div class="tab">
                    <a href="productCat.php">
                        <span class="iconify" data-inline="false" data-icon="flat-color-icons:picture" style="font-size: 24px;"></span>
                        <h5>Photos produits</h5>
                    </a>
                </div>

                <div class="tab">
                    <a href="login.php?action=deconnexion">
                        <span class="iconify" data-inline="false" data-icon="fe:logout" style="font-size: 24px;"></span>
                        <h5>Se déconnecter</h5>
                    </a>
                </div>

                <div class="tab-home">
                    <a href="index.php">
                        <span class="iconify" data-inline="false" data-icon="mdi-light:home" style="font-size: 26px; color: white;"></span>
                        <h5>Accueil</h5>
                    </a>
                </div>

                

            </div>
        </div>
        <div class="container content">

            <h1>Ajouter une image</h1>

            <form action="" method="post">

                <div class="form-group">
                    <label for="name">Nom de l'image</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="id_image">Image</label>
                    <select class="custom-select custom-select-sm" name="id_image" id="id_image">
                        <option value="">-- Selectionner une image --</option>
                        <?php foreach($images as $img): ?>
                            <option value="<?= $img['id_image'] ?>"><?= $img['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="custom-select custom-select-sm" name="type" id="type">
                        <option value="ambiance">Photo ambiance</option>
                        <option value="produit">Photo produit</option>
                        <option value="passionFroid">Photo PassionFroid</option>
                        <option value="fournisseur">Photo Fournisseur</option>
                        <option value="logo">Logo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="with_product">Photo avec produit</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="with_product" value="1" name="with_product">
                        <label class="form-check-label" for="with_product">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="with_product_no" value="0" name="with_product" checked>
                        <label class="form-check-label" for="with_product_no">Non</label>
                    </div>
                </div>

                <div class="form-group">

                    <label for="with_human">Photo avec humain</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="with_human" value="1" name="with_human">
                        <label class="form-check-label" for="with_human">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="with_human_no" value="0" name="with_human" checked>
                        <label class="form-check-label" for="with_human_no">Non</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="institutional">Photo institutionnelle</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="institutional" value="1" name="institutional">
                        <label class="form-check-label" for="institutional">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="institutional_no" value="0" name="institutional" checked>
                        <label class="form-check-label" for="institutional_no">Non</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="format">Format</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="format_img" value="vertical" name="format_img" checked>
                        <label class="form-check-label" for="format_img">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="format_img_no" value="horizontal" name="format_img">
                        <label class="form-check-label" for="format_img_no">Horizontal</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="credit">Crédits photos</label>
                    <input type="text" class="form-control" id="credit" name="credit">
                </div>

                <div class="form-group">
                    <label for="format">Droits d’utilisation limités</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="limited_rights" value="1" name="limited_rights">
                        <label class="form-check-label" for="limited_rights">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="limited_rights_no" value="0" name="limited_rights" checked>
                        <label class="form-check-label" for="limited_rights_no">Non</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="copyright">Copyright</label>
                    <input type="text" class="form-control" id="copyright" name="copyright">
                </div>

                <div class="form-group">
                    <label for="date_end_limited_rights">Date de fin de droits d’utilisation</label>
                    <input type="date" class="form-control" id="date_end_limited_rights" name="date_end_limited_rights">
                </div>

                <button type="submit" class="btn btn-primary mb-4">Créer</button>
            </form>
        </div>
    </body>
</html>
