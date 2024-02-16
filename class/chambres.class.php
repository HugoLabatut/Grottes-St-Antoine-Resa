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