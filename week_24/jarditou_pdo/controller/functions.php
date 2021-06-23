<?php

function connexionBase()
{
   // Paramètre de connexion serveur
   $host = "localhost";
   $login= "root";  // Votre loggin d'accès au serveur de BDD 
   $password="";    // Le Password pour vous identifier auprès du serveur
   $base = "jarditou";  // La bdd avec laquelle vous voulez travailler 

   try 
   {
        $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password);
        return $db;
    } 
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    } 
}

function template_header($title) {
//heredoc string syntax for large volumes of text (<<<EOT)
echo <<<EOT
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <!-- Required meta tags -->
        <!-- Specify character encoding -->
        <meta charset="utf8_unicode_ci">
        <!-- Responsive viewport meta tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>$title</title>
    </head>
    <body class="container">   
    <!-- header -->
    <header class="d-none d-sm-block">
        <div class="row">    
            <img src="src/img/jarditou_logo.jpg" class="image-responsive col-3" alt="logo" title="logo">
            <!--<div class="col-5"></div>-->
            <div class="d-flex col-9 flex-row-reverse">
                <h4>Tout le jardin</h4>
            </div>
        </div>
    </header>
EOT;
}
function template_footer() {
//heredoc string syntax for large volumes of text (<<<EOT)
echo <<<EOT
    <script src="JS_jarditou.js"></script>
        <!-- bootstrap Javascript -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
EOT;
}
?>

   