<?php

if (file_exists("../controller/functions.php") ) 
{
    include("../controller/functions.php");
} 
else 
{
    echo "The file functions does not exist";
} ;// Inclusion de notre bibliothèque de fonctions - connexionBase, template_header et template_footer

$db = connexionBase(); // Appel de la fonction de connexion

?>

<?=template_header('Ajout')?>

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
                    <a class="nav-link" href="liste.php">Tableau</a>
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
    <form id="form_ajout" method="POST" action="../controller/form_ajout_script.php" enctype="multipart/form-data"><!--form-->
        <div class="form-group"><!--Référence-->
            <label for="pro_ref">Référence<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="pro_ref" name="pro_ref">
            <small id="error_reference" class="text-danger"></small>
        </div><!--end référence-->
        <div class="form-group"><!--Catégorie-->
            <label for="cat_nom">Catégorie<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="cat_nom" name="cat_nom">
            <small id="error_cat" class="text-danger"></small>
        </div><!--end categorie-->
        <div class="form-group"><!--Libellé-->
            <label for="pro_libelle">Libellé<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="pro_libelle" name="pro_libelle">
            <small id="error_libelle" class="text-danger"></small>
        </div><!--end libellé-->
        <div class="form-group"><!--Description-->
            <label for="pro_description">Description<sup>&lowast;</sup></label>
            <textarea class="form-control valid row=3" id="pro_description" name="pro_description"></textarea>
            <small id="error_description" class="text-danger"></small>
        </div><!--end description-->
        <div class="form-group"><!--Prix-->
            <label for="pro_prix">Prix<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="pro_prix" name="pro_prix">
            <small id="error_prix" class="text-danger"></small>
        </div><!--end prix-->
        <div class="form-group"><!--Stock-->
            <label for="pro_stock">Stock<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="pro_stock" name="pro_stock">
            <small id="error_stock" class="text-danger"></small>
        </div><!--end stock-->
        <div class="form-group"><!--Couleur-->
            <label for="pro_couleur">Couleur<sup>&lowast;</sup></label>
            <input type="text" class="form-control valid" id="pro_couleur" name="pro_couleur">
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
                <label for="pro_d_ajout" class="col-form-label col-sm-3">Date d'ajout : </label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="pro_d_ajout" name="pro_d_ajout" value="18/04/2018">
                </div>            
            </div>
            <div class="form-group row">
                <label for="pro_d_modif" class="col-form-label col-sm-3">Date de modification : </label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="pro_d_modif" name="pro_d_modif" value="14/11/2018 0h00">
                </div>
            </div>
        </div><!--end dates-->
        <div class="form-group">
            <button type="submit" class="btn btn-primary bg-dark">Envoyer</button>
        </div>
    </form><!--end form-->

<?=template_footer()?>