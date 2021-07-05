<?php


class Employe
{
/*1 Ecrire une classe Employe avec les informations (propriétés) suivantes : Nom, Prénom, Date d’embauche dans
l’entreprise, Fonction (Poste) dans l’entreprise, Salaire en K euros brut annuel, Service dans lequel se situe
l’employé (Comptabilité, Commercial,…)

2. Dans la classe Employe, écrire une méthode permettant de savoir depuis combien d’années
 l’employé est dans l’entreprise.

3. Each year, the employee receives a bonus calculated on the annual salary (5% of gross) and on
seniority (2% of gross for each year of seniority). This bonus is paid on 30/11 of each
year. In the Employee class, write the method (s) used to deduct the amount of this
premium and give the transfer order to the bank on the day of payment. The transfer order to the
bank will just be a message written to the console specifying that the transfer order has been sent to
the bank with mention of the amount.
*/
    private $nom;
    private $prenom;
    private $date_dembauche;
    private $poste;
    private $salaire_brut;
    private $service;
    public $duree;

    public function determine_duree($date_dembauche)
    {

        $this->today = new DateTime();
        $this->date_dembauche = new DateTime($date_dembauche);

        $this->duree = $this->date_dembauche->diff($this->today);
        echo "The employee has been at the firm for " . $this->duree->y . " years";

    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getDateDembauche()
    {
        return $this->date_dembauche;
    }

    /**
     * @return mixed
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * @return mixed
     */
    public function getSalaireBrut()
    {
        return $this->salaire_brut;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $date_dembauche
     */
    public function setDateDembauche($date_dembauche)
    {
        $this->date_dembauche = $date_dembauche;
    }

    /**
     * @param mixed $poste
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;
    }

    /**
     * @param mixed $salaire_brut
     */
    public function setSalaireBrut($salaire_brut)
    {
        $this->salaire_brut = $salaire_brut;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }
}

//Exercise 2
//Displays how long the employee has been in the company.
$employee_one = new Employe();
$employee_one->determine_duree("2013-09-04");