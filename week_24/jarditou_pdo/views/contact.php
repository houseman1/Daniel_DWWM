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
    <div col-12>
        <!--registration form----------------------------------------------------------------->
        <form method="POST" action="../controller/input_validation.php">
            <br>
            <h4 class="mb-3">Nous contacter</h4>
        <!--surname, first name and date of birth inputs row----------->
            <!--'form-row' combined with 'col-sm-4' displays three columns on tablets and desktops-->
            <!--The inputs are stacked on mobiles-->
            <!--'mb-3' ensures a bottom margin on each div containing a label, input and small.  This improves the readability of error messages-->
            <!--'sr-only' label class hides the label to sighted users but makes the label visible to screen readers and search engines-->
            <div class="form-row justify-content align-items-start mb-3">
                <!--surname-->
                <div class="col-sm-4 mb-3">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php if(isset($contact_nom)) {echo $contact_nom;} ?>">
                    <small class="error text-danger"> <?php if(isset($contact_nom_error)) {echo $contact_nom_error;} ?> </small>
                </div><!--end surname-->
                <!--first name-->
                <div class="col-sm-4 mb-3">
                    <label for="prenom">Prenom</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Pr&eacute;nom" value="<?php if(isset($contact_prenom)) {echo $contact_prenom;} ?>">
                    <small class="error text-danger"> <?php if(isset($contact_prenom_error)) {echo $contact_prenom_error;} ?> </small>
                </div><!--end first name-->
                <!--date of birth-->
                <div class="col-sm-4 mb-3 datepicker" >
                    <span class="form-group">
                        <label for="dob">Date de naissance</label>
                        <input type="date" class="form-control" name="dob" value="<?php if(isset($contact_dob)) {echo $contact_dob;} ?>">
                    </span>
                    <small class="error text-danger"> <?php if(isset($contact_dob_error)) {echo $contact_dob_error;} ?> </small>
                </div><!--end date of birth-->
            </div><!--end surname, first name and date of birth inputs row----------->
        <!--gender inputs row----------->
            <!--'form-row' combined with 'col-sm-4' displays three columns on tablets and desktops-->
            <!--The inputs are stacked on mobiles-->
            <!--'my-3' ensures a top and bottom margin on the inline radios-->
            <!--'sr-only' label class hides the label to sighted users but makes the label visible to screen readers and search engines-->
            <!--gender radios-->
            <div class="form-row justify-content align-items-start ml-1"
                <div class="col-sm-4 my-0">
                    <label class="mr-2" for="gender">Sexe : </label>
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" value="Féminin" name="optradio"
                            <?php
                            if(isset($_POST['optradio']))
                            {
                                if($_POST['optradio'] == 'Féminin')
                                {
                                    echo "checked";
                                }
                            }
                            ?>
                        >Féminin
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" value="Masculin" name="optradio"
                            <?php
                            if(isset($_POST['optradio']))
                            {
                                if($_POST['optradio'] == 'Masculin')
                                {
                                    echo "checked";
                                }
                            }
                            ?>
                        >Masculin
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" value="Neutre" name="optradio"
                            <?php
                            if(isset($_POST['optradio']))
                            {
                                if($_POST['optradio'] == 'Neutre')
                                {
                                    echo "checked";
                                }
                            }
                            ?>
                        >Neutre
                    </div>
                </div>
                <small class="error text-danger mb-3"> <?php if(isset($contact_gender_error)) {echo $contact_gender_error;} ?> </small>
            </div><!--end gender radios-->
        <!--address, postcode and town inputs row----------->
            <!--'form-row' combined with 'col-sm-4' displays three columns on tablets and desktops-->
            <!--The inputs are stacked on mobiles-->
            <!--'mb-3' ensures a bottom margin on each div containing a label, input and small.  This improves the readability of error messages-->
            <!--'sr-only' label class hides the label to sighted users but makes the label visible to screen readers and search engines-->
            <div class="form-row justify-content-start align-items-start mt-3 mb-3">
                <!--address-->
                <div class="col-sm-4 mb-3">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control" name="address" placeholder="Adresse" value="<?php if(isset($contact_address)) {echo $contact_address;} ?>">
                    <small class="error text-danger"> <?php if(isset($contact_address_error)) {echo $contact_address_error;} ?> </small>
                </div><!--end address-->
                <!--postcode-->
                <div class="col-sm-4 mb-3">
                    <label for="postcode">Code postal</label>
                    <input type="text" class="form-control" name="postcode" placeholder="Code postal" value="<?php if(isset($contact_postcode)) {echo $contact_postcode;} ?>">
                    <small class="error text-danger"> <?php if(isset($contact_postcode_error)) {echo $contact_postcode_error;} ?> </small>
                </div><!--end code postal-->
                <!--town-->
                <div class="col-sm-4 mb-3">
                    <label for="town">Ville</label>
                    <input type="text" class="form-control" name="town" placeholder="Ville" value="<?php if(isset($contact_town)) {echo $contact_town;} ?>">
                    <small class="error text-danger"> <?php if(isset($contact_town_error)) {echo $contact_town_error;} ?> </small>
                </div><!--end town-->
            </div><!--end address, postcode and town inputs row----------->
            <!--email-->
            <div class="form-row justify-content-start align-items-center mb-5">
                <div class="col-sm-4 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Adresse e-mail" value="<?php if(isset($contact_email)) {echo $contact_email;} ?>">
                    <small class="error text-danger"> <?php if(isset($contact_email_error)) {echo $contact_email_error;} ?> </small>
                </div>
            </div><!--end email-->
            <div>
                <h4 class="mb-3">Votre demande</h4>
            </div>
        <!--subject and question input row----------->
            <!--'form-row' combined with 'col-sm-4' displays three columns on tablets and desktops-->
            <!--The inputs are stacked on mobiles-->
            <!--'mb-3' ensures a bottom margin on each div containing a label, input and small.  This improves the readability of error messages-->
            <!--'sr-only' label class hides the label to sighted users but makes the label visible to screen readers and search engines-->
            <div class="form-row justify-content-start align-items-start mb-3">
                <!--subject-->
                <div class="col-sm-4 mb-3">
                    <label for="subject">Votre sujet</label>
                    <select class="custom-select" name="subject" aria-label="Default select example">
                        <option selected disabled value="0">Veuillez s&eacute;l&eacute;ctionner</option>
                        <option value="1" <?php
                            if(isset($contact_subject))
                            {
                                if($contact_subject == 1)
                                    {
                                        echo "selected";
                                    }
                            } ?> >Mes commandes</option>
                        <option value="2" <?php
                            if(isset($contact_subject))
                            {
                                if($contact_subject == 2)
                                {
                                    echo "selected";
                                }
                            } ?> >Questions sur un produit</option>
                        <option value="3" <?php
                            if(isset($contact_subject))
                            {
                                if($contact_subject == 3)
                                {
                                    echo "selected";
                                }
                            } ?> >R&eacute;clamation</option>
                        <option value="4" <?php
                            if(isset($contact_subject))
                            {
                                if($contact_subject == 4)
                                {
                                    echo "selected";
                                }
                            } ?> >Autres</option>
                    </select>
                    <small class="error text-danger"> <?php if(isset($contact_subject_error)) {echo $contact_subject_error;} ?> </small>
                </div><!--end subject-->
                <!--question-->
                <div class="col-sm-4 mb-3">
                    <label for="question">Votre question</label>
                    <textarea class="form-control" name="question" placeholder="Veuillez saisir votre question" rows=2><?php if(isset($contact_question)) {echo $contact_question;} ?></textarea><!--end address-->
                    <small class="error text-danger"> <?php if(isset($contact_question_error)) {echo $contact_question_error;} ?> </small>
                </div>
            </div><!--end subject and question input row----------->
            <!--checkbox-->
            <div class="form-check mb-3 ml-2">
                <input type="checkbox" class="form-check-input" name="jaccepte">
                <label class="form-check-label font-weight-light" for="jaccepte">J'accepte le traitment de ce formulaire</label>
                <small class="error text-danger"> <?php if(isset($contact_jaccepte_error)) {echo $contact_jaccepte_error;} ?> </small>
            </div><!--end checkbox-->
            <div class="ml-0 mb-3"><!--envoyer button-->
                <input class="btn btn-dark" type="submit" value="Envoyer" name="contact">
            </div><!--end envoyer button-->
        </form><!--end registration form---------------------------------------------------------------->
    </div><!--end div--------------------------------------------------------------------------->
</main>

<div class="row"><!--bottom navbar --------------------------------------------------------------->
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

