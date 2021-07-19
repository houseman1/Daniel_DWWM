<?php
    # The 'require_once' keyword is used to embed PHP code from another file.
    # Le 'require_once' mot-clé est utilisé pour intégrer du code PHP à partir d'un autre fichier.
    # If the file is not found, a fatal error is thrown and the program stops.
    # Si le fichier n'est pas trouvé, une erreur fatale est renvoyée et le programme s'arrête.
    # If the file was already included previously, this statement will not include it again.
    # Si le fichier a déjà été inclus précédemment, cette instruction ne l'inclura pas à nouveau.

    # Embed libraries from the folder 'libraries'
    # Intégrer des bibliothèques du dossier 'libraries'
    require_once 'libraries/Core.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Database.php';

    require_once 'config/config.php';

    # Instantiate core class
    $init = new Core();