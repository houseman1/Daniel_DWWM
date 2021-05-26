<?php
if (file_exists("../controller/functions.php") ) 
{
    include("../controller/functions.php");
} 
else 
{
    echo "The file functions does not exist";
} 
?>

<?=template_header('Details')?>
    
    <div class="row"><!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
                <a class="navbar-brand" href="index.html">Jarditou</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="views/tableau.php">Tableau</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="views/contact.php">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Votre promotion" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div><!--end navbar-->
        <div class="row max-width"><!--promo banner -->
            <img src="src/img/promotion.jpg" class="image-fluid w-100" alt="promotion" title="promotion">    
        </div><!--end promo banner -->

        <?php
            //connect to the database
            $db = connexionBase();

        FETCH SINGLE POST
        $sql = 'SELECT * FROM posts WHERE libelle = :libelle';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $post=$stmt->fetch();
        ?>

<?=template_footer()?>