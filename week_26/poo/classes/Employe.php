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

    public function __construct($nom, $prenom, $date_dembauche, $poste, $salaire_brut, $service)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_dembauche = new DateTime($date_dembauche);
        $this->poste = $poste;
        $this->salaire_brut = $salaire_brut;
        $this->service = $service;
    }

    public function determine_duree()
    {
        $this->today = new DateTime();

        $this->duree = $this->date_dembauche->diff($this->today);
        echo "The employee has been at the firm for " . $this->duree->y . " years";

    }

    public function

}

//Exercise 2 result:
//Displays how long the employee has been in the company.
//($nom, $prenom, $date_dembauche, $poste, $salaire_brut, $service)
$employee_one = new Employe('Reeves', 'Vic', '2015-09-04', 'dev', '30000', 'informatique');
$employee_one->determine_duree("2013-09-04");