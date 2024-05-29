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
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function getTarifByCategorie($idc)
    {
        $data = [":idcategorie" => $idc];
        $sql = "SELECT * FROM tarifs WHERE id_categorie = :idcategorie";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }

    public function setTarif($valeur, $idcat, $idbar)
    {
        $data = [
            ":valeur" => $valeur,
            ":idcat" => $idcat,
            ":idbar" => $idbar
        ];
        $sql = "INSERT INTO tarifs (valeur_tarif, id_categorie, id_bar) VALUES (:valeur, :idcat, :idbar)";
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

    public function editTarif($idt, $idbar, $val)
    {
        $data = [
            ":idtarif" => $idt,
            ":idbar" => $idbar,
            ":valeurtarif" => $val
        ];
        $sql = "UPDATE tarifs SET valeur_tarif = :valeurtarif, id_bar = :idbar WHERE id_tarif = :idtarif";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }
}
