<?php
if (file_exists("controller/functions.php") ) 
{
    include("controller/functions.php");
} 
else 
{
    echo "The file functions does not exist";
} 
?>

<?=template_header('Home')?>

    <!-- navbar -->
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
            <a class="navbar-brand" href="#">Jarditou</a>
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
    </div>
    <!--promo banner -->
    <div class="row">
        <img src="src/img/promotion.jpg" class="image-fluid w-100" alt="promotion" title="promotion">    
    </div>
    <!-- main -->
    <main class="max-width">
        <div class="row">
            <!-- left column -->
            <div id="leftColumnAccueil" class="col-12 col-sm-6 col-md-7 col-lg-8 col-xl-9">
                <section id="section1">
                    <h1>Accueil</h1>
                    <hr>
                    <article>
                        <h3>L'entreprise</h3>
                        <p>Notre entreprise familiale met tout son savoir-faire &agrave; votre disposition dans le domaine du jardin et du paysagisme.</p>
                        <p>Cr&eacute;e il y a 70 ans, notre entreprise vend fleurs, arbustes, mat&eacute;riel &agrave; main et motoris&eacute;s.</p>
                        <p>Implant&eacute;s &agrave; Amiens, nous intervenons dans tout le d&eacute;partement de la Somme : Albert, Doullens, P&eacute;ronne, Abbeville, Corbie</p>
                    </article>
                    <article>       
                        <h3>Qualit&eacute;</h3>
                        <p>Nous mettons &agrave; votre disposition un service personnalis&eacute;, avec 1 seul interlocuteur durant tout votre projet.</p>
                        <p>Vous serez s&eacute;duit par notre expertise, nos comp&eacute;tences et notre s&eacute;rieux.</p>
                    </article>
                    <article>
                        <h3>Devis gratuit</h3>
                        <p>Vous pouvez bien s&ucirc;r contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le r&eacute;alisons gratuitement.</p>                 
                    </article>
                    <hr>
                </section>           
            </div>
            <!-- right column -->
            <div id="rightColumn" class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 bg-warning text-center p-3">
                <h4>[Colonne de droite]</h4>
            </div>
        </div>        
    </main>
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

