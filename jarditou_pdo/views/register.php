<?php

//include functions: connexionBase, header and footer
if (file_exists("../controller/functions.php")) {
    include("../controller/functions.php");
} else {
    echo "The file functions does not exist";
}

//Assign the connection to the PDO object $db
$db = connexionBase();
?>

<?= template_header("S'inscrire") ?>

<div class="row"><!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
        <a class="navbar-brand" href="../index">Jarditou</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                        <?php
                            if($_SERVER['REQUEST_URI'] = '/jarditou_pdo/controller/input_validation.php')
                            {
                                    $login_path = '../views/login.php';
                            }
                            else {
                                $login_path = 'login.php';
                            }
                        ?>
                    <a class="nav-link" href= "<?php echo $login_path ?>" >Déjà Inscrit</a>
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
    <div class="row">
        <!-- left column ---------------------------------------------------------------------------------------------->
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
        </div><!--end left column-------------------------------------------------------------------------------------->

        <!--right column----------------------------------------------------------------------------------------------->
        <div id="rightColumn" class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 bg-info text-center text-white p-3">
            <form method="POST" action="../controller/input_validation.php"><!--registration form-->
                <br>
                <h4>S'inscrire</h4>
                <br>
                <div class="col-md-12"><!--nom-->
                    <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php if(isset($register_nom)) {echo $register_nom;} ?>">
                    <small class="error"> <?php if(isset($register_nom_error)) {echo $register_nom_error;} ?> </small>
                    <br> <br>
                </div><!--end nom-->
                <div class="col-md-12"><!--prenom-->
                    <input type="text" class="form-control" name="prenom" placeholder="Pr&eacute;nom" value="<?php if(isset($register_prenom)) {echo $register_prenom;} ?>">
                    <small class="error"> <?php if(isset($register_prenom_error)) {echo $register_prenom_error;} ?> </small>
                    <br> <br>
                </div><!--end prenom-->
                <div class="col-md-12"><!--email-->
                    <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php if(isset($register_email)) {echo $register_email;} ?>">
                    <small class="error"> <?php if(isset($register_email_error)) {echo $register_email_error;} ?> </small>
                    <br> <br>
                </div><!--end email-->
                <div class="col-md-12"><!--username-->
                    <input type="text" class="form-control" name="username" placeholder="Identifiant" value="<?php if(isset($register_username)) {echo $register_username;} ?>">
                    <small class="error"> <?php if(isset($register_username_error)) {echo $register_username_error;} ?> </small>
                    <br> <br>
                </div><!--end username-->
                <div class="col-md-12"><!--password-->
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" value="<?php if(isset($register_password)) {echo $register_password;} ?>">
                    <small class="error"> <?php if(isset($register_password_error)) {echo $register_password_error;} ?> </small>
                    <br> <br>
                </div><!--end password-->
                <div class="col-md-12"><!--confirm password-->
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirmez le mot de passe">
                    <small class="error"> <?php if(isset($register_confirm_password_error)) {echo $register_confirm_password_error;} ?> </small>
                    <br> <br>
                </div><!--end confirm password-->
                <div class="col-12"><!--envoyer button-->
                    <input class="btn btn-dark" type="submit" value="Envoyer" name="register">
                </div><!--end envoyer button-->
                <br>
                <small id="pass_info" class="form-text"><sup>&lowast;</sup> Le mot de passe doit comporter au moins 8 caractères et doit inclure au moins
                    une lettre majuscule, un chiffre et un caractère spécial</small>
            </form><!--end registration form-->
        </div><!--end right column------------------------------------------------------------------------------------->
    </div>
</main>

<div class="row"><!-- navbar -->
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
</div>



<?=template_footer()?>