<html>
    <body>
        <?php

        //Create a new class PersonnageDefault
        class cla_PersonnageDefault
        {
            public $nom;
            public $prenom;
            public $age;
            public $sexe;


            //Assign the properties ($nom, $prenom, $age and $sex) as attributes of a constructor.
            //The __construct() function is automatically called when an object is created from a class.
            function __construct($nom, $prenom, $age, $sexe)
            {
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->age = $age;
                $this->sexe = $sexe;
            }

            //The __destruct() function is automatically called at the end of the script.
            function __destruct()
            {
                echo "Votre personnage est {$this->prenom} {$this->nom}. <br>Son âge : {$this->age}<br>Son sexe : {$this->sexe}.";
            }
        }

        //Create a new object from the class 'cla_PersonnageDefault'.
        $obj_PersonnageDefault = new cla_PersonnageDefault("Loper", "Dave", "18", "masculin");

        ?>
    </body>
</html>


