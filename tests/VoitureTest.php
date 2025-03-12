<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ .'/../app/models/Voiture.php'; // path to the class file

class VoitureTest extends TestCase
{
    public function testGettersSetters()
    {
        //créer un objet voiture 
        $voiture = new Voiture(1, 'Toyota', 'Corolla', 20000, 2020);

        //vérifier avec les assertions que les prorpiétés affectées à notre objet à sa création son bien assognées
        $this->assertEquals(1, $voiture->getId());
        $this->assertEquals('Toyota', $voiture->getMarque());
        $this->assertEquals('Corolla', $voiture->getModele());
        $this->assertEquals(20000, $voiture->getPrix());
        $this->assertEquals(2020, $voiture->getAnnee());

        // modifier les propriétés de la voiture et s'assurer que toutesles valeurs ont bien été mises à jour
        $voiture->setId(2);
        $voiture->setMarque('Honda');
        $voiture->setModele('Civic');
        $voiture->setPrix(25000);
        $voiture->setAnnee(2021);

        $this->assertEquals(2, $voiture->getId());
        $this->assertEquals('Honda', $voiture->getMarque());
        $this->assertEquals('Civic', $voiture->getModele());
        $this->assertEquals(25000, $voiture->getPrix());
        $this->assertEquals(2021, $voiture->getAnnee());
    }
}