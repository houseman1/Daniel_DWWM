<?php
    if (file_exists("functions.php") )
    {
        include("functions.php");
    }
    else
    {
        echo "The file functions does not exist";
    }

    $db = connexionBase(); // Appel de la fonction de connexion

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// set the PDO error mode to exception

//dans ce fichier, nous récupérons les informations nécessaires,
//pour réaliser la requête pour un nouvel enregistrement : UPDATE

//récupération des informations passées en POST, nécessaires à la modification


$pro_id_post          = $_POST['pro_id'];
$pro_cat_id_post      = $_POST['cat_nom'];
$pro_ref_post         = $_POST['pro_ref'];
$pro_libelle_post     = $_POST['pro_libelle'];
$pro_description_post = $_POST['pro_description'];
$pro_prix_post        = $_POST['pro_prix'];
$pro_stock_post       = $_POST['pro_stock'];
$pro_couleur_post     = $_POST['pro_couleur'];
$pro_date_post        = date("y-m-d");

var_dump($_POST);

//construction de la requête INSERT sans injection SQL --
$requete = $db->prepare("UPDATE produits SET
                                 pro_cat_id      = :pro_cat_id_bind,
                                 pro_libelle     = :pro_libelle_bind,
                                 pro_description = :pro_description_bind,
                                 pro_prix        = :pro_prix_bind,
                                 pro_stock       = :pro_stock_bind,
                                 pro_couleur     = :pro_couleur_bind,
                                 pro_d_modif     = :pro_d_modif_bind
                                 WHERE pro_id    = :pro_id_bind");
// All values to be UPDATED in the query must have a bindValue including the value in the WHERE condition
$requete->bindValue(':pro_id_bind',          $pro_id_post);
$requete->bindValue(':pro_cat_id_bind',      $pro_cat_id_post);
$requete->bindValue(':pro_libelle_bind',     $pro_libelle_post);
$requete->bindValue(':pro_description_bind', $pro_description_post);
$requete->bindValue(':pro_prix_bind',        $pro_prix_post);
$requete->bindValue(':pro_stock_bind',       $pro_stock_post);
$requete->bindValue(':pro_couleur_bind',     $pro_couleur_post);
$requete->bindValue(':pro_d_modif_bind',     $pro_date_post);

$requete->execute();

//libère la connection au serveur de BDD
$requete->closeCursor();

//redirection vers la page .php
header("Location: ../views/form_modif.php");