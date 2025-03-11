<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Connexion à MySQL
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
echo "Connexion réussie à MySQL!";
?>
