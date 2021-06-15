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

<?= template_header("Contacter") ?>

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
                        $register_path = '../views/register.php';
                    }
                    else {
                        $register_path = 'register.php';
                    }
                    ?>
                    <a class="nav-link" href= "<?php echo $register_path ?>" >Nouveau client</a>
                </li>
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
                    <a class="nav-link" href= "<?php echo $login_path ?>" >Déjà client</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href= "#" >Contact</a>
                </li>
                <li class="nav-item active">
                    <?php
                    if($_SERVER['REQUEST_URI'] = '/jarditou_pdo/controller/input_validation.php')
                    {
                        $logout_path = '../controller/logout.php';
                    }
                    else {
                        $logout_path = 'logout.php';
                    }
                    ?>
                    <a class="nav-link" href= "<?php echo $logout_path ?>" >Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
</div><!--end navbar-->

<div class="row d-none d-sm-block"><!--promo banner----------->
    <img src="src/img/promotion.jpg" class="imgage-responsive w-100" alt="promotion" title="promotion">
</div><!--end promo banner----------->

<!-- main ---------------------------------------------------------------------------------------->
<main class="max-width">
    <div class="row"><!--two columns in main-->
        <!-- left column ------------------------------------------------------------------------->
        <div id="leftColumnAccueil" class="col-12 col-sm-6 col-md-7 col-lg-8 col-xl-9">
            <!--registration form----------------------------------------------------------------->
            <div method="POST" action="../controller/input_validation.php">
                <br>
                <h4>Nous contacter</h4>
                <br>
                <!--name, first name and gender inputs-->
                <div class="row justify-content-around"
                    <!--nom-->
                    <div class="col-md-4">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Indiquez ici votre nom de famille" value="<?php if(isset($contact_nom)) {echo $contact_nom;} ?>">
                        <small class="error"> <?php if(isset($contact_nom_error)) {echo $contact_nom_error;} ?> </small>
                        <br> <br>
                    </div><!--end nom-->
                    <!--prenom-->
                    <div class="col-md-4">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Indiquez ici votre pr&eacute;nom" value="<?php if(isset($contact_prenom)) {echo $contact_prenom;} ?>">
                        <small class="error"> <?php if(isset($contact_prenom_error)) {echo $contact_prenom_error;} ?> </small>
                        <br> <br>
                    </div><!--end prenom-->
                    <div class="col-md-4">
                        <label for="gender">Sexe</label>
                        <div class="form-check-inline">
                            <input type="radio"
                        </div>
                    </div>
                </div><!--end name, first name and gender inputs-->
                <!--email-->
                <div class="col-md-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Indiquez ici l'adresse email à laquelle vous souhaitez recevoir les messages" value="<?php if(isset($contact_email)) {echo $contact_email;} ?>">
                    <small class="error"> <?php if(isset($contact_email_error)) {echo $contact_email_error;} ?> </small>
                    <br> <br>
                </div><!--end email-->
                <!--date of birth-->
                <div class="col-md-12">
                    <label for="dob">Date de naissance</label>
                    <input type="text" class="form-control" name="dob" placeholder="Indiquez ici votre date de naissance au format suivant : jj/mm/aaaa" value="<?php if(isset($contact_dob)) {echo $contact_dob;} ?>">
                    <small class="error"> <?php if(isset($contact_dob_error)) {echo $contact_dob_error;} ?> </small>
                    <br> <br>
                </div><!--end date of birth-->
                <!--code postal-->
                <div class="col-md-12">
                    <label for="code_postal">Code postal</label>
                    <input type="text" class="form-control" name="code_postal" placeholder="Indiquez ici votre code postal" value="<?php if(isset($contact_code_postal)) {echo $contact_code_postal;} ?>">
                    <small class="error"> <?php if(isset($contact_code_postal_error)) {echo $contact_code_postal_error;} ?> </small>
                    <br> <br>
                </div><!--end code postal-->
                <!--address-->
                <div class="col-md-12">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control" name="address" placeholder="Indiquez ici la première ligne de votre adresse" value="<?php if(isset($contact_address)) {echo $contact_address;} ?>">
                    <small class="error"> <?php if(isset($contact_address_error)) {echo $contact_address_error;} ?> </small>
                    <br> <br>
                </div><!--end address-->
                <div class="col-12"><!--envoyer button-->
                    <input class="btn btn-dark" type="submit" value="Envoyer" name="register">
                </div><!--end envoyer button-->
                <br>
                <small id="pass_info" class="form-text"><sup>&lowast;</sup> Le mot de passe doit comporter au moins 8 caractères et doit inclure au moins
                    une lettre majuscule, un chiffre et un caractère spécial</small>
            </form><!--end registration form---------------------------------------------------------------->
        </div><!--end left column--------------------------------------------------------------------------->


        <!--right column----------------------------------------------------------------------------------------------->
        <div id="rightColumn" class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 bg-light p-3">

        </div><!--end right column------------------------------------------------------------------------------------->
    </div><!--end two columns in main------------------------------------------------------------->
</main>
