<?php

class Agence
{
    private $nom_agence;
    private $adresse_agence;
    private $code_postal_agence;
    private $ville_agence;
    private $resto_agence;


    public function __construct($nom_agence, $adresse_agence, $code_postal_agence, $ville_agence, $resto_agence)
    {
        $this->nom_agence = $nom_agence;
        $this->adresse_agence = $adresse_agence;
        $this->code_postal_agence = $code_postal_agence;
        $this->ville_agence = $ville_agence;
        $this->resto_agence = $resto_agence;
    }

    public function restaurant(){
        if ($this->resto_agence) {

        }
    }







    /**
     * @param mixed $resto_agence
     */
    public function setRestoAgence($resto_agence): void
    {
        $this->resto_agence = $resto_agence;
    }

    /**
     * @param mixed $resto
     */
    public function setResto($resto): void
    {
        $this->resto = $resto;
    }







}


