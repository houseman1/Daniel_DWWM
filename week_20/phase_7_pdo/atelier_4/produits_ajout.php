<?php
include 'functions.php';// Inclusion de notre bibliothèque de fonctions - connexionBase, template_header et template_footer

$db = connexionBase(); // Appel de la fonction de connexion

?>

<?=template_header('Ajout')?>

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
                <a class="navbar-brand" href="../index.php">Jarditou</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="tableau.php">Tableau</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
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
        <!--form-->
        <div class="container col-4">
            
        </div>
</body>

<?=template_footer()?>