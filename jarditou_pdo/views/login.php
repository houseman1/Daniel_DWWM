<?php
//include functions: connexionBase, header and footer
if (file_exists("../controller/functions.php")) {
    include("../controller/functions.php");
} else {
    echo "The file functions does not exist";
}

//Assign the connection to the PDO object $db
$db = connexionBase();

if(isset($_POST['login']))
{
    $username = ($_POST['username']);
}


?>

<?= template_header('Login') ?>

<div class="row"><!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
        <a class="navbar-brand" href="../index">Jarditou</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="register.php">S'incrire</a>
                </li>
            </ul>
        </div>
    </nav>
</div><!--end navbar-->

<div class="row d-none d-sm-block"><!--promo banner-->
    <img src="src/img/promotion.jpg" class="imgage-responsive w-100" alt="promotion" title="promotion">
</div><!--end promo banner-->

<!-- main -->
<main class="max-width">
    <div class="row"><!--two columns in main-->
        <!-- left column ------------------------------------------------------------------------->
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
        </div><!--end left column------------------------------------------------------------------>
        <!--right column--------------------------------------------------------------------------->
        <div id="rightColumn" class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 bg-warning text-center p-3">
            <form method="POST" action="../controller/login_process.php"><!--login form-->
                <br>
                <h4>Login</h4>
                <br>
                <div class="col-md-12"><!--username-->
                    <input type="text" class="form-control" name="username" placeholder="Identifiant">
                    <small class="error"> <?php if(isset($username)) {echo $error_username;} ?> </small>
                    <br>
                </div><!--end username-->
                <div class="col-md-12"><!--password-->
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                    <br>
                </div><!--end password-->
                <div class="col-12"><!--envoyer button-->
                    <button class="btn btn-dark" type="submit" value="login" name="login">Se connecter</button>
                </div><!--end envoyer button-->
            </form><!--end login form-->
        </div><!--end right column---------------------------------------------------------------->
    </div><!--end two columns in main-->
</main>

<div class="row"><!--bottom navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark col-12">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" ></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div><!--end bottom navbar-->



<?=template_footer()?>
