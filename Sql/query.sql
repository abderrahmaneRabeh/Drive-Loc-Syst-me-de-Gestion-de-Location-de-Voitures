CREATE DATABASE CarRentalPlatform;

USE CarRentalPlatform;

CREATE TABLE roles (
    id_role INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(255) NOT NULL,
)

CREATE TABLE utilisateurs (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles (id_role)
);

CREATE TABLE categories{
    id_category INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(25)
}

CREATE TABLE vehicule (
    id_vehivule INT AUTO_INCREMENT PRIMARY KEY,
    modele VARCHAR(100),
    marque VARCHAR(100) NOT NULL,
    prixJournalier DECIMAL(10, 2) NOT NULL,
    disponible BOOLEAN DEFAULT TRUE,
    kilometrage INT NOT NULL,
    carburant ENUM('Essence', 'Diesel', 'Électrique') NOT NULL,
    nombrePortes INT NOT NULL,
    capacite INT NOT NULL,
    transmission ENUM('Manuelle', 'Automatique') NOT NULL,
    couleur VARCHAR(50) NOT NULL,
    annee YEAR NOT NULL,
    categorie_id INT NOT NULL,
    FOREIGN KEY (categorie_id) REFERENCES categories(id_category)
);

CREATE TABLE Avis (
    id_avis INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    vehicule_id INT NOT NULL,
    contenu TEXT NOT NULL,
    note INT,
    date DATE NOT NULL,
    estSupprime BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (client_id) REFERENCES utilisateurs(id_utilisateur),
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(id_vehivule)
);

CREATE TABLE reservations (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    vehicule_id INT NOT NULL,
    dateDebut DATE NOT NULL,
    dateFin DATE NOT NULL,
    lieuPriseCharge VARCHAR(255) NOT NULL,
    lieuRetour VARCHAR(255) NOT NULL,
    statut ENUM('Confirmee', 'En attente', 'Annulee') NOT NULL DEFAULT 'En attente',
    dateCreation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES utilisateurs(id_utilisateur),
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(id_vehivule)
);


