<?php

class Tarif
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getTarifs()
    {
        $sql = "SELECT * FROM tarifs";
        $stmt = $this->con->prepare($sql);
        $row = $stmt->execute();
        return $row;
    }

    public function getTarifByCategorie($idc)
    {
        $data = [":idcategorie" => $idc];
        $sql = "SELECT * FROM tarifs WHERE id_categorie = :idcategorie";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function setTarif($lib, $datedeb, $datefin, $valeur, $idcat)
    {
        $data = [
            ":lib" => $lib,
            ":datedeb" => $datedeb,
            ":datefin" => $datefin,
            ":valeur" => $valeur,
            ":idcat" => $idcat
        ];
        $sql = "INSERT INTO tarifs (lib_tarif, date_debut_saisonnalite, date_fin_saisonnalite, valeur_tarif, id_categorie) VALUES (:lib, :datedeb, :datefin, :valeur, :idcat)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function setTarifByCategorie($idc)
    {
        $data = [":idcategorie" => $idc];
        $sql = "SELECT * FROM tarifs WHERE id_categorie = :idcategorie";
        $stmt = $this->con->prepare($sql);
        $row = $stmt->execute($data);
        return $row;
    }
}
