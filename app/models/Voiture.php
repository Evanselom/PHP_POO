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

    // Method to fetch all cars from the database
    public static function getAll(): array
{
    try {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM voitures";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $voitures = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $voitures[] = new Voiture($row['id'], $row['marque'], $row['modele'], $row['prix'], $row['annee']);
        }

        // Return array of Voiture objects
        return $voitures;
    } catch (Exception $e) {
        // Log the error message
        error_log("Error fetching all cars: " . $e->getMessage());
        // Return an empty array in case of error
        return [];
    }
}

    // Method to add a car to the database
    public function addNew()
    {
        $conn = Database::getConnection();
        $sql = "INSERT INTO voitures (marque, modele, prix, annee) VALUES (:marque, :modele, :prix, :annee)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':marque', $this->marque, PDO::PARAM_STR);
        $stmt->bindParam(':modele', $this->modele, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $this->prix, PDO::PARAM_STR);
        $stmt->bindParam(':annee', $this->annee, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Method to add a car using a stored procedure (insert_voiture)
    public function addUsingStoredProc()
    {
        $conn = Database::getConnection();
        $query = "CALL insert_voiture(:marque, :modele, :annee, :prix)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':marque', $this->marque, PDO::PARAM_STR);
        $stmt->bindParam(':modele', $this->modele, PDO::PARAM_STR);
        $stmt->bindParam(':annee', $this->annee, PDO::PARAM_INT);
        $stmt->bindParam(':prix', $this->prix, PDO::PARAM_STR);
        $stmt->execute();
    }
}
