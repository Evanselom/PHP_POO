<?php

// Inclure les fichiers nécessaires
require_once 'app/router/Router.php';
require_once 'app/controllers/VoitureController.php';

// Créer une instance du routeur
$router = new Router();

// Ajouter des routes
$router->addRoute('/', 'VoitureController', 'index');      // Afficher les voitures
$router->addRoute('/create', 'VoitureController', 'create'); // Ajouter une voiture

// Exécuter la route basée sur l'URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->execute($requestUri);
?>