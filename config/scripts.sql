CREATE DATABASE voiture_db;


USE voiture_db;

CREATE TABLE voitures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(100) NOT NULL,
    modele VARCHAR(100) NOT NULL,
    annee INT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL
);


INSERT INTO voitures (marque, modele, annee, prix)
VALUES
('Toyota', 'Corolla', 2020, 20000.00),
('BMW', 'X5', 2022, 50000.00),
('Audi', 'A4', 2021, 35000.00);


-- PROCEDURE  INSERTION DANS LA TABLE VOITURE
DELIMITER $$

CREATE PROCEDURE insert_voiture(
    IN p_marque VARCHAR(100),
    IN p_modele VARCHAR(100),
    IN p_annee INT,
    IN p_prix DECIMAL(10,2)
)
BEGIN
    INSERT INTO voitures (marque, modele, annee, prix) 
    VALUES (p_marque, p_modele, p_annee, p_prix);
END$$

DELIMITER ;

