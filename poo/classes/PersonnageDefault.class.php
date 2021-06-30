
        <?php

        //Create a new class PersonnageDefault
        class PersonnageDefault
        {
            public $nom = "Looper";
            public $prenom = "Dave";
            public $age = "18";
            public $sexe = "masculin";

            function  __construct()
            {
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->age = $age;
                $this->sexe = $masculin;
            }

            /*function  __construct()
            {
                $this->nom = 'Looper;
                $this->prenom = 'Dave';
                $this->age = "18";
                $this->sexe = "masculin";
            }

            //Assign the properties ($nom, $prenom, $age and $sex) as attributes of a constructor.
            //The __construct() function is automatically called when an object is created from a class.
            /*function __construct($nom, $prenom, $age, $sexe)
            {
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->age = $age;
                $this->sexe = $sexe;
            }*/

            /*function  __construct()
            {
                $this->nom = 'Looper;
                $this->prenom = 'Dave';
                $this->age = "18";
                $this->sexe = "masculin";
            }*/

            //The __destruct() function is automatically called at the end of the script.

            /*function __destruct()
            {
                echo "Le personnage par défaut est {$this->prenom} {$this->nom}. <br>Son âge : {$this->age}<br>Son sexe : {$this->sexe}.";
            }*/
        }
        $obj_pd = new PersonnageDefault();

        //Create a new object from the class 'cla_PersonnageDefault'.
        //$obj_pd = new PersonnageDefault("Loper", "Dave", "18", "masculin");



        ?>



