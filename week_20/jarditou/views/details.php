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
        
        <title>Tableau</title>
    </head>    
    <body class="container">   
        <!-- header -->
        <header class="d-none d-sm-block">
            <div class="row">    
                <img src="src/img/jarditou_logo.jpg" class="image-responsive col-3" alt="logo" title="logo">
                <div class="col-5"></div>
                <h3 class="col-3">Tout le jardin</h3>
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

        <?php 
        //Connect to database   
        require "../controller/connect_db.php"; 
        $db = connect_db();
        $pro_id = $_GET["pro_id"];
        $requete = "SELECT * FROM produits join categories on cat_id = pro_cat_id WHERE pro_id=".$pro_id; 

        $result = $db->query($requete);

        //Assign $row as an object
        $row = $result->fetch(PDO::FETCH_OBJ);

        ?>
            <div>
                <div class="col-12 d-flex justify-content-center">
                    <img src="src/img/<?=$pro_id?>" class="w-25" alt="Image responsive" title="<?=$pro_id.".".$row->pro_photo;?>" >
                </div>
                <form name="prod_details" id="prod_details" method="GET">
                    <div class="form-group">
                        <!--Référence-->
                        <label for="pro_ref"><b>Référence :</b></label>
                        <input type="text" class="form-control" name="pro_ref" id="pro_ref" 
                            value="<?php echo $row->pro_ref?>" Readonly>

                        <!--Catégorie-->
                        <label for="nomProduit"><b>Catégorie :</b></label>
                        <input type="text" class="form-control" name="nomProduit" id="nomProduit" 
                            value="<?php echo $row->cat_nom?>" Readonly>

                        <!--Libéllé-->
                        <label for="pro_libelle"><b>Libéllé :</b></label>
                        <input type="text" class="form-control" name="pro_libelle" id="pro_libelle" 
                            value="<?php echo $row->pro_libelle ?>" Readonly>

                        <!--Description-->
                        <label for="pro_description"><b>Description :</b></label>
                        <textarea class="form-control" rows="2" name="pro_description" id="pro_description"
                            value="<?php echo $row->pro_description?>"Readonly></textarea>

                        <!--Prix-->
                        <label for="pro_prix"><b>Prix :</b></label>
                        <input type="text" class="form-control" name="pro_prix" id="pro_prix" 
                            value="<?php echo $row->pro_prix ?>" Readonly>

                        <!--Stock-->
                        <label for="pro_stock"><b>Stock :</b></label>
                        <input type="number" class="form-control" name="pro_stock" id="pro_stock" 
                            value="<?php echo $row->pro_stock ?>" Readonly>

                        <!--Couleur-->
                        <label for="pro_couleur"><b>Couleur :</b></label>
                        <input type="text" class="form-control" name="pro_couleur" id="pro_couleur" 
                            value="<?php echo $row->pro_couleur ?>" Readonly>

                        <br>

                        <!--Bloqué-->
                        <label for="pro_bloque"><b>Produit bloqué :</b></label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="pro_bloque">Oui&nbsp;</label>
                                <input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque1"  
                                    <?php if ($row->pro_bloque == 1) echo"checked"; ?> disabled>
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="pro_bloque">Non&nbsp;</label>
                                <input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque2"   
                                    <?php if ($row->pro_bloque == 0) echo"checked"; ?> disabled>
                            </div>

                        <br>

                        <!--Date d'ajout-->
                        <label for="pro_d_ajout"><b>Date d'ajout :</b></label>
                        <input type="text" class="form-control" name="pro_d_ajout" id="pro_d_ajout" 
                            value="<?php echo $row->pro_d_ajout?>" Readonly>

                        <!--Date de modification-->
                        <label for="pro_d_modif"><b>Date de modification :</b></label>
                        <input type="text" class="form-control" name="pro_d_modif" id="pro_d_modif" 
                            value="<?php echo $row->pro_d_modif?>" Readonly>
                    </div>  
                    <!--Retour, Modifier and Supprimer buttons.  Modifier and Supprimer pass the $pro_id value to the next page-->
                    <div class="form-group" name = "details_buttons">
                        <a href="tableau.php" class="btn btn-secondary" role="button">Retour</a>
                        <a href="add_form.php?pro_id=<?=$pro_id;?>" class="btn btn-warning" role="button" name="modif">Modifier</a>
                        <a href="delete.php?pro_id=<?=$pro_id;?>" class="btn btn-danger" role="button" name="delete">Supprimer</a>
                    </div>
                </form>
            </div>
        <!--<script src="public/js/evalContact.js"></script>-->
        <!--fichiers Javascript nécessaires à Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
