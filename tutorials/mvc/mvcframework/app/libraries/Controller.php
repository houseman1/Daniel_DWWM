<?php

    # Load the model and the view
    # Charger le modèle et la vue
    class Controller {
        public function model($model) {
            # Require the model file
            # Exiger le fichier modèle
            require_once '../app/models/' . $model . '.php';
            # Instantiate the model
            # Instancier le modèle
            return new $model();
        }

        # Load the view (checks for the file)
        # Charger la vue (vérifier le fichier
        public function view($view, $data = []) {
            if(file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exist.");
            }
        }
    }

?>
