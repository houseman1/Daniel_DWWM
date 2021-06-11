

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

        <title>Contact Bootstrap</title>
    </head>
    <body class="container">

    <?php
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $optradio = $_POST["optradio"];
        $ddn = $_POST["ddn"];
        $codeP = $_POST["codeP"];
        $adresse = $_POST["adresse"];
        $ville = $_POST["ville"];
        $email = $_POST["email"];
        $sujet = $_POST["sujet"];
        $question = $_POST["question"];
        if(isset($_POST["jaccepte"])){
        $jaccepte = $_POST["jaccepte"];
        }
    ?>
        <!-- form -->
        <div class="container col-4"></div>
            <form id="formContact" method="POST" action="../controller/contact_validation.php">
                <div class="align-items-center">
                    <p class="font-weight-light"><sup>&lowast;</sup>Ces zones sont obligatoires</p>
                    <h1>Vos coordonnés</h1>
                    <!-- nom -->
                    <div class="form-group">
                        <label for="valueNom">Nom<sup>&lowast;</sup></label>
                        <input type="text" class="form-control valid" id="valueNom" name="nom" placeholder="Veuillez saisir votre nom" value="<?php echo $nom;?>">
                        <small id="errorNom" name="error_nom" class="text-danger"></small>
                        <span class="text-danger">
                            <?php if(isset($error_nom)){echo $error_nom;$error_counter++;}?>
                        </span>
                    </div>
                    <!-- prénom -->
                    <div class="form-group">
                        <label for="valuePrenom">Prénom<sup>&lowast;</sup></label>
                        <input type="text" class="form-control" id="valuePrenom" name="prenom" placeholder="Veuillez saisir votre prénom" value="<?php echo $prenom;?>">
                        <small id="errorPrenom" name="error_prenom" class="text-danger"></small>
                        <span class="text-danger">
                            <?php if(isset($error_prenom)){echo $error_prenom;$error_counter++;}?>
                        </span>
                    </div>
                    <!-- radio buttons -->
                    <div>
                        <p>Sexe<sup>&lowast;</sup></p>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Féminin" name="optradio" checked>Féminin
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Masculin" name="optradio">Masculin
                            </label>
                        </div>
                        <div class="form-check-inline disabled">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Neutre" name="optradio">Neutre
                            </label>
                        </div>
                    </div>
                    <br>
                    <!-- date of birth -->
                    <div class="form group">
                            <label for="valueDdn">Date de naissance<sup>&lowast;</sup></label>
                            <input class="form-control" type="date" id="valueDdn" name="ddn" value="<?php echo $ddn;?>>
                            <small id="errorDdn" name="error_ddn" class="text-danger"></small>
                            <span class="text-danger">
                                <?php if(isset($error_ddn)){echo $error_ddn;$error_counter++;}?>
                            </span>
                    </div>
                    <br>
                    <!-- code postal -->
                    <div class="form-group">
                        <label for="valueCode">Code Postal<sup>&lowast;</sup></label>
                        <input type="text" class="form-control" id="valueCode" name="codeP" placeholder="Veuillez saisir votre code postal" value="<?php echo $codeP;?>">
                        <small id="errorCode" name="error_code" class="text-danger"></small>
                        <span class="text-danger">
                                <?php if(isset($error_codeP)){echo $error_codeP;$error_counter++;}?>
                        </span>
                    </div>
                    <!-- addresse -->
                    <div class="form-group">
                        <label for="addresse">Adresse</label>
                        <input type="text" class="form-control" id="addresse" name="adresse" value="<?php echo $adresse;?>">
                    </div>
                    <!-- ville -->
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville">
                    </div>
                    <!-- email -->
                    <div class="form-group">
                        <label for="valueEmail">Email<sup>&lowast;</sup></label>
                        <input type="email" class="form-control" id="valueEmail" name="email" placeholder="dave.loper@afpa.fr" value="<?php echo $email;?>">
                        <small id="errorEmail" name="error_email" class="text-danger"></small>
                        <span class="text-danger">
                                <?php if(isset($error_email)){echo $error_email;$error_counter++;}?>
                        </span>
                    </div>
                    <br>
                    <div>
                        <h1>Votre demande</h1>
                    </div>
                    <!-- select -->
                    <div>
                        <label class="my-1 mr-2" for="valueSelect">Sujet<sup>&lowast;</sup></label>
                        <select class="custom-select my-1 mr-sm-2" id="valueSelect" name="sujet" >
                            <option value="0">Veuillez s&eacute;l&eacute;ctionner un sujet</option>
                            <option value="1">Mes commandes</option>
                            <option value="2">Questions sur un produit</option>
                            <option value="3">R&eacute;clamation</option>
                            <option value="4">Autres</option>
                        </select>
                        <small id="errorSelect" name="error_sujet" class="text-danger"></small>
                        <span class="text-danger">
                                <?php if(isset($error_sujet)){echo $error_sujet;$error_counter++;}?>
                        </span>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                        </div>
                        <!-- question -->
                        <div class="form-group">
                            <label for="valueQuestion">Votre question<sup>&lowast;</sup></label>
                            <textarea class="form-control" id="valueQuestion" name="question" rows="3" placeholder="Veuillez saisir votre question" value="<?php echo $question;?>"></textarea>
                            <small id="errorQuestion" class="text-danger"></small>
                            <span class="text-danger">
                                <?php if(isset($error_question)){echo $error_question;$error_counter++;}?>
                            </span>
                        </div>
                    </div>
                    <!-- checkbox -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="valueCheckbox" name="jaccepte">
                        <label class="form-check-label font-weight-light" for="valueCheckbox">J'accepte le traitment de ce formulaire.</label>
                        <small id="errorCheckbox" name="error_jaccepte" class="text-danger"></small>
                        <span class="text-danger">
                                <?php if(isset($error_jaccepte)){echo $error_jaccepte;$error_counter++;}?>
                        </span>
                    </div>
                    <br>
                    <!-- buttons -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary bg-dark">Envoyer</button>
                        <button type="submit" class="btn btn-primary bg-dark">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
        <br>