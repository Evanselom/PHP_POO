<?php

require_once __DIR__ .'/../../config/db.php';
require_once __DIR__ .'/../models/Voiture.php'; // Update the path to your Voiture class

class VoitureRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getAll(): array
    {
        try {
            $sql = "SELECT * FROM voitures";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $voitures = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $voitures[] = new Voiture($row['id'], $row['marque'], $row['modele'], $row['prix'], $row['annee']);
            }

            return $voitures;
        } catch (Exception $e) {
            error_log("Error fetching all cars: " . $e->getMessage());
            return [];
        }
    }

    public function add(Voiture $voiture)
    {
        $marque = $voiture->getMarque();
        $modele = $voiture->getModele();
        $prix = $voiture->getPrix();
        $annee = $voiture->getAnnee();  
        try {
            $sql = "INSERT INTO voitures (marque, modele, prix, annee) VALUES (:marque, :modele, :prix, :annee)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':marque', $marque, PDO::PARAM_STR);
            $stmt->bindParam(':modele', $modele, PDO::PARAM_STR);
            $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
            $stmt->bindParam(':annee', $annee, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            error_log("Error adding car: " . $e->getMessage());
            throw new Exception("Error adding car.");
        }
    }

    public function addUsingStoredProc(Voiture $voiture)
    {
        try {
            $query = "CALL insert_voiture(:marque, :modele, :annee, :prix)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':marque', $voiture->getMarque(), PDO::PARAM_STR);
            $stmt->bindParam(':modele', $voiture->getModele(), PDO::PARAM_STR);
            $stmt->bindParam(':annee', $voiture->getAnnee(), PDO::PARAM_INT);
            $stmt->bindParam(':prix', $voiture->getPrix(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            error_log("Error adding car using stored procedure: " . $e->getMessage());
            throw new Exception("Error adding car using stored procedure.");
        }
    }
}
?>