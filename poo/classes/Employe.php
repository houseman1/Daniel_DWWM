<?php

class Employe
{
    private $nom;
    private $prenom;
    private $date_dembauche;
    private $poste;
    private $salaire_brut;
    private $service;
    public $today;
    private $salaire_plus_primes;
    private $duree;
    private $ref_agence;

    public function __construct($nom, $prenom, $date_dembauche, $poste, $salaire_brut, $service, $ref_agence)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_dembauche = new DateTime($date_dembauche);
        $this->poste = $poste;
        $this->salaire_brut = $salaire_brut;
        $this->service = $service;
        $this->ref_agence = $ref_agence;
    }

    public function __destruct()
    {
        // Uncomment the following line to test the bank transfer message automatically sent on the 30/11 of each year.
        //$this->today = new DateTime('2020-11-30');

        // Check if the day and month of the DateTime object are 30 and 11.
        // If so, display the bank transfer message.
        $this->today = date_format($this->today, 'd-m');
        if($this->today == '30-11')
        {
            echo $this->salaire_plus_primes . " has been transferred to the bank.<br>";
        }
    }

    public function agence()
    {
        echo $this->prenom." ".$this->nom." works at ".$this->ref_agence->nom_agence.", "
            .$this->ref_agence->adresse_agence.", ".$this->ref_agence->ville_agence.", "
            .$this->ref_agence->code_postal_agence.", "."<br>";
    }

    public function determine_duree()
    {
        // Create new DateTime object ('diff' can only execute using objects).
        // 'date_dembauche' was delclared as a DateTime object in the constructor.
        $this->today = new DateTime();
        $this->duree = $this->date_dembauche->diff($this->today);

        // Calculate and display how many days if 'duree' is less than a year.
        // Calculate and display how many years if 'duree' is one year or more.
        if($this->duree->y < 1)
        {
            if($this->duree->days == 1)
            {
                $this->d = " day.";
            } else
            {
                $this->d = " days.";
            }

            echo $this->prenom . " " . $this->nom . " has been at the firm for "
                . $this->duree->days . $this->d . "<br><br>";
        } else
        {
            echo $this->prenom . " " . $this->nom . " has been at the firm for "
                . $this->duree->y . " years. <br><br>";
        }

    }

    public function determine_prime()
    {
        // Calculate the 5% bonus
        $this->prime = $this->salaire_brut * 5 / 100;

        //Set the seniority bonus to 1 year if the employee has been at the firm for less than one year.
        if($this->duree->y < 1)
        {
            $this->duree->y = 1;
        }

        // Calculate the 2% bonus
        $this->anciennete = $this->salaire_brut * ($this->duree->y * 2 / 100);

        // Calculate the total salary after bonuses
        $this->salaire_plus_primes = $this->salaire_brut + $this->prime + $this->anciennete;

        // Display the result
        echo "Employee Name: " . $this->prenom . " " . $this->nom . "<br>Gross salary before bonuses: "
            . $this->salaire_brut . "<br>5% Bonus: " . $this->prime . "<br>Seniority Bonus: "
            . $this->anciennete . "<br>Total Salary after Bonuses: " . $this->salaire_plus_primes . "<br><br>";
    }

    /**
     * @param mixed $ref_agence
     */
    public function setRefAgence($ref_agence)
    {
        $this->ref_agence = $ref_agence;
    }

    /**
     * @return mixed
     */
    public function getRefAgence()
    {
        return $this->ref_agence;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

}