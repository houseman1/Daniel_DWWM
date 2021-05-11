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
        <!-- header -->
        <header class="d-none d-sm-block">
            <div class="row">    
                <img src="src/img/jarditou_logo.jpg" class="image-responsive col-3" alt="logo" title="logo">
                <div class="col-4"></div>
                <h2 class="col-5">La qualit&eacute; depuis 70 ans</h2>
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
        <!--promo banner -->
        <div class="row">
            <img src="src/img/promotion.jpg" class="imgage-fluid w-100" alt="promotion" title="promotion">    
        </div>
        <!-- form --> 
        <div class="container col-4"></div>
            <form id="formContact" method="GET" action="http://bienvu.net/script.php">
                <div class="align-items-center">
                    <p class="font-weight-light"><sup>&lowast;</sup>Ces zones sont obligatoires</p>
                    <h1>Vos coordonnés</h1>
                    <!-- nom -->
                    <div class="form-group">
                        <label for="valueNom">Nom<sup>&lowast;</sup></label>
                        <input type="text" class="form-control valid" id="valueNom" placeholder="Veuillez saisir votre nom">
                        <small id="errorNom" class="text-danger"></small>
                    </div>
                    <!-- prénom -->
                    <div class="form-group">
                        <label for="valuePrenom">Prénom<sup>&lowast;</sup></label>
                        <input type="text" class="form-control" id="valuePrenom" placeholder="Veuillez saisir votre prénom">
                        <small id="errorPrenom" class="text-danger"></small>
                    </div>
                    <!-- radio buttons -->
                    <div>
                        <p>Sexe<sup>&lowast;</sup></p>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio" checked>Féminin
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">Masculin
                            </label>
                        </div>
                        <div class="form-check-inline disabled">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">Neutre
                            </label>
                        </div>  
                    </div>
                    <br>
                    <!-- date of birth -->
                    <div class="form row">         
                        <div class="form-group col-12">
                            <label for="valueDdn">Date de naissance<sup>&lowast;</sup></label>
                            <input class="form-control" type="date" id="valueDdn">
                            <small id="errorDdn" class="text-danger"></small>
                        </div>
                    </div>
                    <br>
                    <!-- code postal -->
                    <div class="form-group">
                        <label for="valueCode">Code Postal<sup>&lowast;</sup></label>
                        <input type="text" class="form-control" id="valueCode">
                        <small id="errorCode" class="text-danger"></small>
                    </div>
                    <!-- addresse -->
                    <div class="form-group">
                        <label for="addresse">Adresse</label>
                        <input type="text" class="form-control" id="addresse">
                    </div>
                    <!-- ville -->
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville">
                    </div>
                    <!-- email -->
                    <div class="form-group">
                        <label for="valueEmail">Email<sup>&lowast;</sup></label>
                        <input type="email" class="form-control" id="valueEmail" placeholder="dave.loper@afpa.fr">
                        <small id="errorEmail" class="text-danger"></small>
                    </div>
                    <br>
                    <div>    
                        <h1>Votre demande</h1>
                    </div>
                    <!-- select -->
                    <div>
                        <label class="my-1 mr-2" for="valueSelect">Sujet<sup>&lowast;</sup></label>
                        <select class="custom-select my-1 mr-sm-2" id="valueSelect">
                            <option selected disabled value="">Veuillez s&eacute;l&eacute;ctionner un sujet</option>
                            <option value="1">Mes commandes</option>
                            <option value="2">Questions sur un produit</option>
                            <option value="3">R&eacute;clamation</option>
                            <option value="4">Autres</option>
                        </select>
                        <small id="errorSelect" class="text-danger"></small>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                        </div>
                        <!-- question -->
                        <div class="form-group">
                            <label for="valueQuestion">Votre question<sup>&lowast;</sup></label>
                            <textarea class="form-control" id="valueQuestion" rows="3"></textarea>
                            <small id="errorQuestion" class="text-danger"></small>
                        </div>
                    </div>
                    <!-- checkbox -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="valueCheckbox">
                        <label class="form-check-label font-weight-light" for="valueCheckbox">J'accepte le traitment de ce formulaire.</label>
                        <small id="errorCheckbox" class="text-danger"></small>
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
        <script src="JS_jarditou.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>