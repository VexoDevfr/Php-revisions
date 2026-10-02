<?php
require_once 'connexion.php';
class DialogueBD {

    // ARTISTES ET SCENES
    public function getTousLesArtistes()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM artistes ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabArtistes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabArtistes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getToutesLesScenes()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM scenes ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabScenes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabScenes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getUneScene($idScene)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM scenes WHERE id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idScene));
            $scene = $sth->fetchObject();
            return $scene;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getArtistesScene($idScene)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM artistes WHERE scene_id=?";
            $sql = $sql . " ORDER BY nom_artiste";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idScene));
            $tabArtistes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabArtistes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    // FOURNISSEURS ET PRODUITS
    public function getTousLesFournisseurs()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM fournisseurs ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabFournisseurs = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabFournisseurs;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getUnFournisseur($idFournisseur)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM fournisseurs WHERE id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idFournisseur));
            $fournisseur = $sth->fetchObject();
            return $fournisseur;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getProduitsFournisseur($idFournisseur)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM produits WHERE fournisseur_id=?";
            $sql = $sql . " ORDER BY nom_produit";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idFournisseur));
            $tabProduits = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabProduits;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    // EMPRUNTEURS ET LIVRES

    public function getToutLesLivres()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM livres ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabLivres = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabLivres;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getToutLesEmprunteurs()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM emprunteurs ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmprunteurs = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmprunteurs;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getUnLivre($idLivre)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM livres WHERE id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idLivre));
            $livre = $sth->fetchObject();
            return $livre;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getEmprunteursLivre($idLivre)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM emprunteurs WHERE id_livre=?";
            $sql = $sql . " ORDER BY nom";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idLivre));
            $tabEmprunteurs = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmprunteurs;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    // VETERINAIRES ET ANIMAUX

    public function getToutLesVeterinaires()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM veterinaires ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabVeterinaires = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabVeterinaires;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getToutLesAnimaux()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM animaux ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabAnimaux = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabAnimaux;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getUnVeterinaire($idVeterinaire)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM veterinaires WHERE id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idVeterinaire));
            $veterinaire = $sth->fetchObject();
            return $veterinaire;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getAnimauxVeterinaire($idVeterinaire)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM animaux WHERE veterinaire_id=?";
            $sql = $sql . " ORDER BY nom_animal";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idVeterinaire));
            $tabAnimaux = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabAnimaux;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    // VOLS PASSAGERS

    public function getToutLesVols()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM vols ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabVols = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabVols;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getToutLesPassagers()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM passagers ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabPassagers = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabPassagers;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getUnVol($idVol)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM vols WHERE id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idVol));
            $vol = $sth->fetchObject();
            return $vol;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getPassagersVol($idVol)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM passagers WHERE vol_id=?";
            $sql = $sql . " ORDER BY nom";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idVol));
            $tabPassagers = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabPassagers;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    // PROJETS EMPLOYES
    public function getToutLesProjets()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM projets ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabProjets = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabProjets;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getToutLesEmployes()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM employes ORDER BY id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getUnProjet($idProjet)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM projets WHERE id=?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idProjet));
            $projet = $sth->fetchObject();
            return $projet;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getEmployesProjet($idProjet)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * FROM employes WHERE projet_id=?";
            $sql = $sql . " ORDER BY nom";
            $sth = $conn->prepare($sql);
            $sth->execute(array($idProjet));
            $tabEmployes = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabEmployes;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}