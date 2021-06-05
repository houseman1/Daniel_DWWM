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

<?=template_header('')?>

<?php
    //form validation
    //define variables and set to empty values
    $nom = 
?>

    <main class="max-width"> <!-- main -->
        <div class="row"><!--columns-->
            <!-- left column -->
            <div id="leftColumnAccueil" class="col-12 col-sm-6 col-md-7 col-lg-8 col-xl-9 bg-light">
                <br>
                <h4>Nouveaux clients</h4>
                <br>
                <form class="row g-3 needs-validation method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"" novalidate><!--new user login form-->
                    <div class="col-md-4"><!--nom-->
                        <label for="validationCustom02" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="validationCustom02" name="inp_nom" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <br>
                    </div><!--end nom-->
                    <div class="col-md-4"><!--prénom-->
                        <label for="validationCustom01" class="form-label">Pr&eacute;nom</label>
                        <input type="text" class="form-control" id="validationCustom01" name="inp_prenom" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <br>
                    </div><!--end prénom-->
                    <div class="col-md-4"><!--email-->
                        <label for="validationCustom02" class="form-label">Email</label>
                        <input type="email" class="form-control" id="validationCustom02" name="inp_email" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <br>
                    </div><!--end email-->
                    <div class="col-md-4"><!--identifiant-->
                        <label for="validationCustom02" class="form-label">Identifiant</label>
                        <input type="text" class="form-control" id="validationCustom02" name="inp_username" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <br>
                    </div><!--end identifiant-->

                    <div class="col-md-4"><!--password-->
                        <label for="validationCustom03" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="validationCustom03" name="inp_password" required>
                        <div class="invalid-feedback">
                            non-validé
                        </div>
                        <br>
                    </div><!--end password-->

                    <div class="col-12"><!--envoyer button-->
                        <button class="btn btn-primary" type="submit" name="submit1">Envoyer</button>
                    </div><!--end envoyer button-->
                </form><!--end new user login form-->
                <br>
            </div><!--end left column-->

            <div id="rightColumn" class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 bg-warning text-center p-3"><!-- right column -->
                <br>
                <h4>Déjà inscrit</h4>
                <br>
                <div class="col-md-12"><!--identifiant-->
                    <label for="validationCustom02" class="form-label">Identifiant</label>
                    <input type="text" class="form-control" id="validationCustom02" name="inp_login_identifiant2" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <br>
                </div><!--end identifiant-->
                <div class="col-md-12"><!--password-->
                    <label for="validationCustom03" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="validationCustom03" name="inp_login_password" required>
                    <div class="invalid-feedback">
                        non-validé
                    </div>
                    <br>
                </div><!--end password-->
                <div class="col-12"><!--envoyer button-->
                    <button class="btn btn-primary" type="submit" name="submit2">Se connecter</button>
                </div><!--end envoyer button-->
            </div><!--end right column-->
        </div><!--end columns-->
    </main><!--end main-->
       
<?=template_footer()?>


