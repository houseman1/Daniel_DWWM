<?php

session_start();

if (file_exists("../controller/functions.php") )
{
    include("../controller/functions.php");
} 
else 
{
    echo "The file functions does not exist";
}

//Assign the connection to the PDO object $db
$db = connexionBase();

?>

<?=template_header('Home')?>

    <!-- navbar -->
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
            <a class="navbar-brand" href="client_home.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="../controller/logout.php">Déconnexion</a>
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
        <img src="src/img/promotion.jpg" class="image-fluid w-100" alt="promotion" title="promotion">    
    </div>

<?php
//connect to the database
$db = connexionBase();


//PAGINATION

//Determine which page we are on
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

//Assign the total number of articles to the variable $sql
$sql = "SELECT COUNT(*) AS nb_articles FROM produits";
//Prepare the query
$query = $db->prepare($sql);
//Execute the query
$query->execute();
//Fetch the number of articles and assign it to the variable $result
$result = $query->fetch();
//Determine the total number of items in produits
$nbArticles = (int) $result['nb_articles'];
//Determine the number of items per page
$parPage = 8;
//Assign the total number of pages to the variable $pages
$pages = ceil($nbArticles / $parPage);
//Assign the first item on the page to the variable $premier
$premier = ($currentPage * $parPage) - $parPage;
//Assign 8 items to the variable $requete
$requete = 'SELECT * FROM produits  LIMIT :premier ,:parpage';


//Prepare the query
$result = $db->prepare($requete);
$result->bindValue(':premier', $premier, PDO::PARAM_INT);
$result->bindValue(':parpage', $parPage, PDO::PARAM_INT);

//Execute the query
$result->execute();

//Handle query errors
if (!$result) {
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2];
    die("Erreur dans la requête");
}

if ($result->rowCount() == 0)
{
    //If no records are found
    die("La table est vide");
}

?>

<!-- main -->
<main class="max-width">
    <div class="row"><!--two columns in main-->
        <!-- left column ------------------------------------------------------------------------->
        <div id="leftColumnAccueil" class="col-12 col-sm-6 col-md-7 col-lg-8 col-xl-9">
            <p id="tableau"></p>
            <div class="table-responsive"><!--table div-->
                <table class="table table-hover table-bordered w-100 w-sm-50">
                    <thead>
                    <tr class="table-active">
                        <th>Photos</th>
                        <th>Libellé</th>
                        <th>Prix</th>
                        <th>Couleur</th>
                        <th>Bloqué</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    while ($row = $result->fetch(PDO::FETCH_OBJ)){
                        echo'<tr>';?>
                        <!--photo-->
                        <td class="table-warning"><img src="src/img/<?=$row->pro_id.".".$row->pro_photo;?>" alt="<?=$row->pro_id.".".$row->pro_photo;?>" width="100">.</td>
                        <?php


                        //Libellé column entry with clickable link to details.php
                        echo '<th>'.$row->pro_libelle.'</a></th>';
                        //Prix
                        echo"<th class='table-warning'>".$row->pro_prix."</th>";
                        //Colour
                        echo"<th class='table-warning'>".$row->pro_couleur."</th>";
                        //Display bloqué button if stock is blocked
                        if ($row->pro_bloque == 1){   ?>
                            <th>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Bloqué</button>
                                <!--Modal informing user that they will be contacted when stock becomes available-->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Produit Bloqué</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Nous vous tiendront informé sur les futurs disponibilités du produit.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </div>
                    <?php   }
                            }
                            ?>
                </table>
            </div><!--end table div-->
        </div><!--end left column--------------------------------------------------------------------------------->
        <!--right column--------------------------------------------------------------------------->
        <div id="rightColumn" class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 bg-warning text-center p-3">
            <br>
            <h4>Bienvenue <?php echo $_SESSION['username'] ?> </h4>
            <br>
        </div><!--end right column---------------------------------------------------------------->
    </div> <!--end two columns in main-->
</main>
<!-- Navigation for pagination -->
<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">  <!--disabled pour desactivé le lien en page 1-->
            <a href="liste.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="liste.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">  <!--disabled pour desactivé le lien en page maximum-->
            <a href="liste.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
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
                        <a class="nav-link text-white" href="views/mentions_legale.html">mentions légales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="views/horaires.html">horaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="views/plan_du_site.html">plan du site</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<?=template_footer()?>


