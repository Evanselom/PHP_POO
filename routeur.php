<?php
require_once "app/controllers/VoitureController.php";
require_once "app/controllers/ContactController.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page === 'voiture') {
    $controller = new VoitureController();
    $controller->afficherVoiture();
} elseif ($page === 'contact') {
    $controller = new ContactController();
    $controller->afficherContact();
} else {
    echo "<h1>Bienvenue sur mon site MVC</h1>";
    echo "<p> <a href='?page=voiture'>Voiture</a> </p>";
    echo "<p> <a href='?page=contact'>Contact</a> </p>";
}
?>