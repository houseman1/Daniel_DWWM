<?php
include 'functions.php';// Inclusion de notre bibliothèque de fonctions - connexionBase, template_header et template_footer

$db = connexionBase(); // Appel de la fonction de connexion

?>

<?=template_header('Ajout')?>

<body class="container">   
    <header class="d-none d-sm-block"><!--header-->
        <div class="row">    
            <img src="src/img/jarditou_logo.jpg" class="image-responsive col-3" alt="logo" title="logo">
            <div class="col-4"></div>
            <h2 class="col-5">La qualit&eacute; depuis 70 ans</h2>
        </div>
    </header><!--end header-->
    <div class="row"><!--navbar-->
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
    </div><!--end navbar-->    
    <div class="row d-none d-sm-block"><!--promo banner-->
        <img src="src/img/promotion.jpg" class="imgage-responsive w-100" alt="promotion" title="promotion">    
    </div><!--end promo banner-->  
    <div><!--form-->    
        <div class="form-group"><!--ID-->
            <label for="input_id">ID<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="input_ID">
            <small id="error_id" class="text-danger"></small>
        </div><!--end ID-->
        <div class="form-group"><!--Référence-->
            <label for="input_reference">Référence<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="input_reference">
            <small id="error_reference" class="text-danger"></small>
        </div><!--end référence-->
        <div class="form-group"><!--Catégorie-->
            <label for="input_categorie">Catégorie<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="input_categorie">
            <small id="error_categorie" class="text-danger"></small>
        </div><!--end categorie-->
        <div class="form-group"><!--Libellé-->
            <label for="input_libelle">Libellé<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="input_libelle">
            <small id="error_libelle" class="text-danger"></small>
        </div><!--end libellé-->
        <div class="form-group"><!--Description-->
            <label for="input_description">Description<sup>&lowast;</sup></label>
            <textarea class="form-control valid row=3" id="input_description"></textarea>
            <small id="error_description" class="text-danger"></small>
        </div><!--end description-->
        <div class="form-group"><!--Prix-->
            <label for="input_prix">Prix<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="input_prix">
            <small id="error_prix" class="text-danger"></small>
        </div><!--end prix-->
        <div class="form-group"><!--Stock-->
            <label for="input_stock">Stock<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="input_stock">
            <small id="error_stock" class="text-danger"></small>
        </div><!--end stock-->
        <div class="form-group"><!--Couleur-->
            <label for="input_couleur">Couleur<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="input_couleur">
            <small id="error_couleur" class="text-danger"></small>
        </div><!-- end couleur-->
        <div><!--Radios-->
            <label class="form-check-label" for="radios">Produit bloqué : </label>
            <div class="form-check form-check-inline" name="radios">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio_bloque_oui">
                <label class="form-check-label" for="radio_bloque_oui">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio_bloque_non" checked>
                <label class="form-check-label" for="radio_bloque_non">Non</label>
            </div>
        </div><!--end radios-->
        <div><!--dates-->
            <div class="form-group row">
                <label for="input_date_ajout" class="col-form-label col-sm-3">Date d'ajout : </label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="input_date_ajout" value="18/04/2018">
                </div>            
            </div>
            <div class="form-group row">
                <label for="input_date_modif" class="col-form-label col-sm-3">Date de modification : </label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="input_date_modif" value="14/11/2018 0h00">
                </div>
            </div>
        </div><!--end dates-->
    </div><!--end form-->
</body>

<?=template_footer()?>