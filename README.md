# Drive & Loc - Système de Gestion de Location de Voitures

## Contexte du Projet

L'agence **Drive & Loc** souhaite enrichir son site web en introduisant un système de gestion de location de voitures. L'objectif est de créer une plateforme fonctionnelle et créative permettant aux clients de parcourir et réserver des véhicules adaptés à leurs besoins.

Le projet est développé en **PHP orienté objet (POO)** et **SQL** pour une gestion robuste et performante.

## Fonctionnalités Principales

### 1. **Gestion des utilisateurs**
- 🚗 **Connexion client** : Accès à la plateforme de location après authentification.
- 🏍️ **Exploration des véhicules** : Parcourir les différentes catégories de véhicules.
- 🚗 **Détails des véhicules** : Afficher les détails de chaque véhicule (modèle, prix, disponibilité, etc.).
- 🛣️ **Réservation de véhicules** : Réserver un véhicule en choisissant des dates et lieux de prise en charge.
- 🔎 **Recherche avancée** : Rechercher un véhicule spécifique par son modèle ou ses caractéristiques.
- 🏍️ **Filtrage dynamique** : Filtrer les véhicules par catégorie sans recharger la page.
- 📝 **Avis clients** : Ajouter et gérer les avis sur les véhicules réservés.

### 2. **Gestion de la pagination**
- 🚦 **Pagination classique** : Liste des véhicules paginée à l'aide de PHP.
- 🚙 **Pagination dynamique** : Utilisation de DataTables pour une gestion interactive de la pagination.

### 3. **Gestion des avis**
- 🚙 **Modification ou suppression des avis** : Option de "Soft Delete" pour les avis clients.
  
### 4. **Gestion des administrateurs**
- 🏦 **Ajout de véhicules et catégories** : Ajouter plusieurs véhicules ou catégories en masse.
- 🚨 **Dashboard Admin** : Gérer les réservations, véhicules, avis et catégories avec des statistiques détaillées.
- 🏦 **Gestion des clients** : Accéder à une page dédiée à la gestion des clients.

### 5. **Fonctionnalités supplémentaires (Bonus)**
- 🏆 **Gestion des réservations** : Approuver ou refuser des réservations et envoyer un email au client.
- 🌟 **Options supplémentaires** : Ajouter des options lors de la réservation (GPS, siège enfant, etc.).
- 🏅 **Interaction avec les avis** : Liker ou disliker un avis, marquer un véhicule comme favori.
- 🏅 **Statistiques sur les véhicules** : Accéder aux véhicules les plus réservés et les mieux évalués.

### 6. **Fonctionnalités avancées (Développement Backend)**
- 🏅 **Validation de données en base** : Utilisation de triggers SQL pour valider les champs au niveau de la base de données.
- 🏅 **Procédures stockées** : Implémentation de la procédure `AjouterReservation` pour gérer les réservations.
- 🏅 **Vue SQL** : Création d'une vue SQL `ListeVehicules` combinant les informations nécessaires pour l'affichage de la liste des véhicules.

## Architecture et Technologies

- **Frontend** : HTML, CSS, JavaScript, DataTables (pour pagination dynamique)
- **Backend** : PHP POO
- **Base de données** : MySQL avec procédures stockées, triggers et vues SQL
- **Frameworks** : Aucun framework spécifique utilisé (projet développé de manière native avec PHP et SQL)

