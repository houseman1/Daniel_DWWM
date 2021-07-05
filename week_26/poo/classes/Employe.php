<?php


class Employe
{

//1 Ecrire une classe Employe avec les informations (propriétés) suivantes :
/*Nom
 Prénom
 Date d’embauche dans l’entreprise
 Fonction (Poste) dans l’entreprise
 Salaire en K euros brut annuel
 Service dans lequel se situe l’employé (Comptabilité, Commercial,…)
*/

    private $nom;
    private $prenom;
    private $date_dembauche;
    private $poste;
    private $salaire_brut;
    private $service;

// 2. Dans la classe Employe, écrire une méthode permettant de savoir depuis combien d’années
// l’employé est dans l’entreprise.

    public static function determine_duree()
    {
        $duree = $date_dembauche->diff(new DateTime(null, 'Europe/Paris'));
        return $duree->format('Y');
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

setDateDembauche('2009-02-15');
Employe::determine_duree();