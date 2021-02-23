<?php require_once('base/init.php'); ?>

<?php

// var_dump($_SESSION);


if( !userConnect() ){
    header('location:login.php');
    exit(); 
}

if( userConnect() ){
    $id_user = $_SESSION['user']['id_user'];
}


if( isset($_POST['upload']) ) { //Si on clique sur le bouton 'valider'
     
    // File upload configuration 
    $targetDir =  __DIR__ . "/assets/img/upload/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    $bdd->exec("INSERT INTO image(filename) VALUES ('$fileName')"); 
                    
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 

         
        header('location:dashboard.php');
    
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
     
}

if(isset($_GET["search"])) { //Si on fait une recherche
    $infos = $bdd->query('SELECT * FROM image_info WHERE image_info.name LIKE "%'.$_GET["search"].'%" OR image_info.type LIKE "%'.$_GET["search"].'%" OR with_product LIKE "%'.$_GET["search"].'%" OR with_human LIKE "%'.$_GET["search"].'%" OR credit LIKE "%'.$_GET["search"].'%" OR institutional LIKE "%'.$_GET["search"].'%" OR format_img LIKE "%'.$_GET["search"].'%" ORDER BY id_image_info ')->fetchAll(PDO::FETCH_ASSOC);

}


?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>PassionFroid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- logos & icones-->
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
            <h1>Dashboard admin</h1>


            <form action="" method="GET" class="form-inline" style="float:right;">
                <input class="form-control mr-sm-2" type="search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0">Rechercher</button>
            </form>


            <h4>Importer des images</h4>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="files[]" multiple >
                </div>
                <input type="submit" name="upload" class="btn btn-primary" value="Ajouter">
            </form>

            <br><br>

            <?php if(isset($_GET["search"])): ?>
                <?php if(empty($infos)): ?>
                    <h3>Aucun résultat de recherche</h3>
                <?php endif; ?>
                <?php if(!empty($infos)): ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Type</th>
                                <th scope="col">Photo avec produit</th>
                                <th scope="col">Photo avec humain</th>
                                <th scope="col">Crédits photos</th>
                                <th scope="col">Photo institutionnelle</th>
                                <th scope="col">Format</th>
                                <th scope="col">Editer</th>
                                <th scope="col">Télécharger l'image</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($infos as $info): ?>
                                <tr>
                                    <?php $id_image_info = $info["id_image_info"]; ?>
                                    <th scope="row"><?= $id_image_info; ?></th>
                                    <td><?= $info["name"]; ?></td>
                                    <td><?= $info["type"]; ?></td>
                                    <td><?= $info["with_product"]; ?></td>
                                    <td><?= $info["with_human"]; ?></td>
                                    <td><?= $info["credit"]; ?></td>
                                    <td><?= $info["institutional"]; ?></td>
                                    <td><?= $info["format_img"]; ?></td>
                                    <td><a href="editImageInfo.php?id=<?=$id_image_info?>">Editer</a></td>
                          
                                    <?php $image = $bdd->query("SELECT * FROM image, image_info WHERE image.id_image=image_info.id_image AND image_info.id_image = '$id_image_info' ")->fetchAll(PDO::FETCH_ASSOC); ?>

                                    <td> <a href="assets/img/upload/<?= $image[0]['filename']; ?>" download="<?= $image[0]['filename']; ?>"><button type="submit" class="btn btn-primary"><span class="iconify" data-inline="false" data-icon="bx:bxs-download" style="font-size: 20px;"></span></button></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </body>
</html>
