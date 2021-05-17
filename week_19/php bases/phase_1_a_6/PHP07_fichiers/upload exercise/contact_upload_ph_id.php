<!DOCTYPE html>
    <html lang="fr">
    <head>
        <!-- Required meta tags -->
        <!-- Specify character encoding -->
        <meta charset="utf-8">
        <!-- Responsive viewport meta tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <title>Contact</title>
    </head>    
    <body class="container">
        
    <?php

        // Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
                $prod_id = $_POST['prod_id'];
                //Vérifie si input 'ID produit' est vide
                if (empty($prod_id)){
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
                } else {
                    //Obtenir l'extension            
                    $extension = substr(strrchr($_FILES["photo"]["name"], "."), 1);
                    //Append prod_id à l'extension
                    $prod_id .= "." . $extension;
                    //Télécharger la photo dans le dossier «upload»
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . "$prod_id");
                    echo "Votre fichier a été téléchargé avec succès.";
                    //var_dump($_FILES);
                }  
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
        echo "Error: ".$_FILES["photo"]["error"];
    }
}
?>


        <!-- header -->
        <header class="d-none d-sm-block">
            <div class="row">    
                <img src="src/img/jarditou_logo.jpg" class="image-responsive col-3" alt="logo" title="logo">
                <div class="col-4"></div>
                <h2 class="col-5">La qualit&eacute; depuis 70 ans</h2>
            </div>
        </header>
        <!-- navbar -->
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
                <a class="navbar-brand" href="index.html">Jarditou</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="index.html">Accueil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="TableauBootstrap.html">Tableau</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="ContactBootstrap.html">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Votre promotion" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
        <!--promo banner -->
        <div class="row">
            <img src="src/img/promotion.jpg" class="imgage-fluid w-100" alt="promotion" title="promotion">    
        </div>
        <br>
        <!-- form --> 
        <div class="container col-4"></div>
            <form id="formContact" method="POST" action="contact_upload_ph_id.php" enctype="multipart/form-data">
                <div class="align-items-center">
                    <!-- téléchargement -->  
                    <div class="form-group">
                        <h3>Votre fichier &aacute; t&eacute;l&eacute;charger</h3>
                        <label for="prod_id">ID Produit</label>
                        <input type="text" name="prod_id" id="prod_id">
                        <label for="fileUpload">Fichier:</label>
                        <input type="file" name="photo" id="fileUpload">
                        <input type="submit" name="submit" value="Upload">
                    </div>
                    <br>    
                </div>
            </form>
        </div>
        <!-- navbar -->
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark col-12">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link text-white" href="MentionsLegale.html">mentions légales</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-white" href="Horaires.html">horaires</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-white" href="PlanDuSite.html">plan du site</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <script src="JS_jarditou.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>