<?php
require_once __DIR__ .'/../repositories/VoitureRepository.php';

class VoitureController
{
    private $voitureRepository;

    public function __construct()
    {
        $this->voitureRepository = new VoitureRepository();
    }
    // Afficher toutes les voitures
    public function index()
    {
        $voitures = $this->voitureRepository->getAll();
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

            $voiture = new Voiture(null, $marque, $modele, $prix, $annee);
            $this->voitureRepository->add($voiture);
           // Voiture::add($marque, $modele, $prix,$annee);
            header('Location: /');
        } else {
            include __DIR__ .'/../views/voitureForm.php';
        }
    }
}
?>
