-- Créer la base de données
CREATE DATABASE IF NOT EXISTS annuaire CHARACTER SET utf8mb4;
USE annuaire;

-- Créer la table des employés
CREATE TABLE IF NOT EXISTS employes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    poste VARCHAR(100),
    date_embauche DATE
);

-- Insérer 5 employés
INSERT INTO employes (nom, prenom, email, poste, date_embauche) VALUES
('Ngono', 'Claire', 'claire.ngono@entreprise.com', 'Développeuse Backend', '2021-06-15'),
('Diallo', 'Ibrahima', 'ibrahima.diallo@entreprise.com', 'Technicien Réseau', '2020-03-10'),
('Mbiya', 'Sandra', 'sandra.mbiya@entreprise.com', 'RH', '2019-09-01'),
('Zoua', 'David', 'david.zoua@entreprise.com', 'Chef de projet', '2022-01-20'),
('Kamdem', 'Eric', 'eric.kamdem@entreprise.com', 'Designer UI/UX', '2023-04-05');
