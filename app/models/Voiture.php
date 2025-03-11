<?php

require_once __DIR__ .'/../../config/db.php';

class Voiture
{
    private $id;
    private $marque;
    private $modele;
    private $prix;
    private $annee; // Added this property to align with the `add` and `_add` methods

    public function __construct($id = null, $marque = null, $modele = null, $prix = null, $annee = null)
    {
        $this->id = $id;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->prix = $prix;
        $this->annee = $annee;
    }

    // Getters and setters for each property
    public function getId() {
        return $this->id;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getPrix() {
        return $this->prix;
    }
    
    public function getAnnee() {
        return $this->annee;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }
}
