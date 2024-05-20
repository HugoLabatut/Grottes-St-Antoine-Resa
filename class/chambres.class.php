<?php
class Chambre
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getChambres()
    {
        $sql = "SELECT * FROM chambres";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function getChambreByID($idc)
    {
        $data = [':idchambre' => $idc];
        $sql = "SELECT * FROM chambres WHERE id_chambre = :idchambre";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }

    public function getChambresByCategorie($idcat)
    {
        $data = [':idcate' => $idcat];
        $sql = "SELECT id_chambre FROM chambres WHERE id_categorie = :idcate";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getChambresByDispoAndCategorie($idcate)
    {
        $data = [":idcate" => $idcate];
        $sql = "SELECT * FROM chambres WHERE etat_resa_chambre = 0 AND id_categorie = :idcate";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function setChambre($lib, $idcat)
    {
        $data = [
            ":libelle" => $lib,
            ":idcategorie" => $idcat
        ];
        $sql = "INSERT INTO chambres (lib_chambre, id_categorie) VALUES (:libelle, :idcategorie)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function setChambreIndispo()
    {
        $sql = "UPDATE chambres, dater SET chambres.etat_resa_chambre = 1 WHERE dater.date_debut_resa = CURDATE()";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
    }

    public function setChambreDispo()
    {
        $sql = "UPDATE chambres, dater SET chambres.etat_resa_chambre = 0 WHERE dater.date_fin_resa = CURDATE()";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
    }

    public function setChambreByID($idc, $lib, $idcat)
    {
        $data = [
            ":idchambre" => $idc,
            ":libelle" => $lib,
            ":idcat" => $idcat
        ];
        $sql = "UPDATE chambres SET lib_chambre = :libelle, id_categorie = :idcat WHERE id_chambre = :idchambre";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }
}
