<?php
require_once __DIR__ .'/../models/Voiture.php';

class VoitureController
{
    // Afficher toutes les voitures
    public function index()
    {
        $voitures = Voiture::getAll();
        include __DIR__ .'/../views/voitureList.php';
    }

    // Ajouter une nouvelle voiture
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $prix = $_POST['prix'];
            $annee = $_POST['annee'];

            $voiture = new Voiture(null,$marque, $modele, $prix,$annee);
            $voiture->addNew();
           // Voiture::add($marque, $modele, $prix,$annee);
            header('Location: /');
        } else {
            include __DIR__ .'/../views/voitureForm.php';
        }
    }
}
?>
