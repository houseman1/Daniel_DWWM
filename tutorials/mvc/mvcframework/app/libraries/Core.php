<?php

    # Core App Class

    class Core {

        # If there are no other 'controllers' in the 'controller' file,
        # 'Pages' will be automatically loaded
        # S'il n'y a pas d'autres 'contrôleurs' dans le fichier 'contrôleur',
        #'Pages' sera automatiquement chargé
        protected  $currentController = 'Pages';

        # In the controller 'Pages', the 'index' method will be loaded
        # Dans le contrôleur 'Pages', la méthode 'index' sera chargée
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->getUrl();
            # Look inside the 'controllers' folder for the first value
            # Regardez dans le dossier 'controller' pour la première valeur
            # 'ucwords' will capitalise the first letter
            # 'ucwords' mettra la première lettre en majuscule
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                # Set a new controller
                # Définir un nouveau contrôleur
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }

            # Require the controller
            # Nécessite le contrôleur
            require_once '../app/controllers/' . $this->currentController . '.php';

            # Instantiate the controller
            # Instancier le contrôleur
            $this->currentController = new $this->currentController;

            # Check for the second part of the URL
            if(isset($url[1])) {
                if(method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }

            # Get parameters
            # Obtenir les paramètres
            # If there are no parameters keep '$params' empty
            # S'il n'y a pas de paramètres, laissez '$params' vide
            $this->params = $url ? array_values($url) : [];

            # Call a callback with the array 'params'
            # Appeler un rappel avec le tableau 'params'
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);


        }


        # '$currentController' and '$currentMethod will change when the URL changes
        # '$currentController' et '$currentMethod changeront lorsque l'URL changera
        # Fetch the URL and store it in the array '$params'
        # Récupérer l'URL et la stocker dans le tableau '$params'
        # http://dwwm/tutorials/mvc/mvcframework/test/case
        # returns : Array ( [0] => test [1] => case )
        public function getUrl() {
            if(isset($_GET['url'])) {

                # Remove the '/' from the end of the URL
                # Supprimer le '/' à la fin de l'URL
                $url = rtrim($_GET['url'], '/');

                # Filter the URL to remove characters it should not have
                # # Filtrez l'URL pour supprimer les caractères qu'elle ne devrait pas avoir
                $url = filter_var($url, FILTER_SANITIZE_URL);

                # Break the URL down into an array
                # Décomposer l'URL dans un tableau
                $url = explode('/', $url);

                return $url;
            }
        }

    }

?>
