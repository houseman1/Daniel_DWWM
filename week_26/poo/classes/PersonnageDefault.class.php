
        <?php

        //Create a new class PersonnageDefault
        class PersonnageDefault
        {
            private $nom = "Loper";
            private $prenom = "Dave";
            private $age = "18";
            private $sexe = "Masculin";

            /**
             * @return string
             */
            public function getNom()
            {
                return $this->nom;
            }

            /**
             * @return string
             */
            public function getPrenom()
            {
                return $this->prenom;
            }

            /**
             * @return string
             */
            public function getAge()
            {
                return $this->age;
            }

            /**
             * @return string
             */
            public function getSexe()
            {
                return $this->sexe;
            }

            /**
             * @param string $nom
             */
            public function setNom($nom)
            {
                $this->nom = $nom;
            }

            /**
             * @param string $prenom
             */
            public function setPrenom($prenom)
            {
                $this->prenom = $prenom;
            }

            /**
             * @param string $age
             */
            public function setAge($age)
            {
                $this->age = $age;
            }

            /**
             * @param string $sexe
             */
            public function setSexe($sexe)
            {
                $this->sexe = $sexe;
            }
        }
        ?>