<?php

require "Database.php";

class Voiture extends Database
{
    private $lignes_par_page = 6;
    private $Conx_DataBase;

    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }
    public function getLinesParPage()
    {
        return $this->lignes_par_page;
    }

    public function Nbr_Voiture()
    {
        $query = $this->conx->prepare("SELECT count(*) AS total FROM vehicule");
        $query->execute();
        $result = $query->fetch();
        return $result['total'];
    }

    public function All_Voitures()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM vehicule");
        $query->execute();
        $listVoiture = $query->fetchAll();
        return $listVoiture;
    }

    public function getVoitures($page = 1, $recherche = "")
    {
        $recherche = "%$recherche%";
        $offset = ($page - 1) * $this->lignes_par_page;
        $query = $this->Conx_DataBase->prepare("SELECT * FROM vehicule WHERE modele LIKE :recherche OR marque LIKE :recherche LIMIT :offset, :limit");
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->bindParam(':recherche', $recherche, PDO::PARAM_STR);
        $query->bindParam(':limit', var: $this->lignes_par_page, type: PDO::PARAM_INT);
        $query->execute();
        $listVoiture = $query->fetchAll();
        return $listVoiture;
    }

    public function getOneVoiture($id)
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM vehicule, categories WHERE id_vehivule = :id AND vehicule.categorie_id = categories.id_category");
        $query->bindParam(':id', $id);
        $query->execute();
        $voiture = $query->fetch();
        return $voiture;
    }

    public function Ajouter_Voiture($modele, $marque, $prixJournalier, $transmission, $couleur, $kilometrage, $voiture_img, $disponible, $category)
    {
        $query = $this->Conx_DataBase->prepare("INSERT INTO vehicule 
        (modele, marque, prixJournalier, disponible, kilometrage, transmission, couleur, categorie_id, image_url) 
        VALUES (:modele, :marque, :prixJournalier, :disponible, :kilometrage, :transmission, :couleur, :categorie_id, :image_url)");

        $query->bindParam(':modele', $modele);
        $query->bindParam(':marque', $marque);
        $query->bindParam(':prixJournalier', $prixJournalier);
        $query->bindParam(':disponible', $disponible);
        $query->bindParam(':kilometrage', $kilometrage);
        $query->bindParam(':transmission', $transmission);
        $query->bindParam(':couleur', $couleur);
        $query->bindParam(':categorie_id', $category);
        $query->bindParam(':image_url', $voiture_img);
        $query->execute();

        return $query->rowCount();
    }

    public function Delete_Voiture($id)
    {
        $query = $this->Conx_DataBase->prepare("DELETE FROM vehicule WHERE id_vehivule = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->rowCount();
    }

    public function Modifier_Voiture($id, $modele, $marque, $prixJournalier, $transmission, $couleur, $kilometrage, $voiture_img, $disponible, $category)
    {
        $query = $this->Conx_DataBase->prepare("UPDATE vehicule SET 
        modele = :modele,marque = :marque, prixJournalier = :prixJournalier, disponible = :disponible, kilometrage = :kilometrage, transmission = :transmission, couleur = :couleur, categorie_id = :categorie_id, image_url = :image_url 
        WHERE id_vehivule = :id_vehivule");

        $query->bindParam(':modele', $modele);
        $query->bindParam(':marque', $marque);
        $query->bindParam(':prixJournalier', $prixJournalier);
        $query->bindParam(':disponible', $disponible);
        $query->bindParam(':kilometrage', $kilometrage);
        $query->bindParam(':transmission', $transmission);
        $query->bindParam(':couleur', $couleur);
        $query->bindParam(':categorie_id', $category);
        $query->bindParam(':image_url', $voiture_img);
        $query->bindParam(':id_vehivule', $id);
        $query->execute();
        return $query->rowCount();
    }

    // public function Rechercher_Voiture($recherche)
    // {

    //     $query = $this->Conx_DataBase->prepare("SELECT * FROM vehicule WHERE modele LIKE :recherche OR marque LIKE :recherche");
    //     $query->bindValue(':recherche', $recherche, PDO::PARAM_STR);
    //     $query->execute();
    //     $voitures = $query->fetchAll();
    //     return $voitures;
    // }
}