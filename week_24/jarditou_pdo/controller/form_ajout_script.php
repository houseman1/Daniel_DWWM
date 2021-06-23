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

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// set the PDO error mode to exception

//dans ce fichier, nous récupérons les informations nécessaires,
//pour réaliser la requête pour un nouvel enregistrement : INSERT

//récupération des informations passées en POST, nécessaires à la modification

$pro_cat_id_post      = $_POST['cat_nom'];
$pro_ref_post         = $_POST['pro_ref'];
$pro_libelle_post     = $_POST['pro_libelle'];
$pro_description_post = $_POST['pro_description'];
$pro_prix_post        = $_POST['pro_prix'];
$pro_stock_post       = $_POST['pro_stock'];
$pro_couleur_post     = $_POST['pro_couleur'];

//Create a new instance of the class 'DateTime' to ensure timezone is France.
//This will need to be
$obj_datetime = new DateTime(null, new DateTimeZone('Europe/Paris'));
$pro_date_post = $obj_datetime->format('Y-m-d');

//construction de la requête INSERT sans injection SQL
$requete = $db->prepare("INSERT INTO produits (
                            pro_cat_id,pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_d_ajout) 
                        VALUES(:pro_cat_id_bind,:pro_ref_bind,:pro_libelle_bind,:pro_description_bind,:pro_prix_bind,:pro_stock_bind,:pro_couleur_bind,:pro_d_ajout_bind)");
    $requete->bindValue(':pro_cat_id_bind'     , $pro_cat_id_post);
    $requete->bindValue(':pro_ref_bind'        , $pro_ref_ref);
    $requete->bindValue(':pro_libelle_bind'    , $pro_libelle_post);
    $requete->bindValue(':pro_description_bind', $pro_description_post);
    $requete->bindValue(':pro_prix_bind'       , $pro_prix_post);
    $requete->bindValue(':pro_stock_bind'      , $pro_stock_post);
    $requete->bindValue(':pro_couleur_bind'    , $pro_couleur_post);
    $requete->bindValue(':pro_d_ajout_bind'    , $pro_date_post);

    $requete->execute();

//libère la connection au serveur de BDD
$requete->closeCursor();

//redirection vers la page tableau.php
header("Location: ../views/liste.php");