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
        
        <title>Contact Bootstrap</title>
    </head>    
    <body class="container">   
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


<?php
    echo "<h1/>Merci!</h1>";
    echo "<h3>Votre formulaire a été téléchargé</h3>";

    var_dump($_POST);
    
    switch ($_POST["sujet"]) {
        case "1" :
            $sujet = "Mes commandes";
            break;
        case "2" :
            $sujet = "Questions sur un produit";
            break;
        case "3" :
            $sujet = "Réclammation";
            break;
        case "4" :
            $sujet = "Autres";
            break;
        default :
            $sujet = "";
    }



    echo "<ul>";
    echo "<li>Nom : " . $nom . "</li>";
    echo "<li>Prénom : " . $prenom . "</li>";
    echo "<li>Sexe : " . $optradio . "</li>";
    echo "<li>Date de naissance : " . $ddn . "</li>";
    echo "<li>Code postal : " . $codeP . "</li>";
    echo "<li>Adresse : " . $adresse . "</li>";
    echo "<li>Ville : " . $ville . "</li>";
    echo "<li>Email : " . $email . "</li>";
    echo "<li>Sujet : " . $sujet . "</li>";
    echo "<li>Question : " . "<blockquote>$question</blockquote></li>";
    echo "</ul>";

?>
