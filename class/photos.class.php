<?php

class Photo
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getPhotos()
    {
        $sql = "SELECT * FROM photos";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function getLienPhotoByCategorie($idcat)
    {
        $data = [":idcategorie" => $idcat];
        $sql = "SELECT lien_photo FROM photos WHERE id_categorie = :idcategorie";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }

    public function setPhoto($n, $l, $idc)
    {
        $data = [
            ":nomphoto" => $n,
            ":lienphoto" => $l,
            ":idcategorie" => $idc
        ];
        $sql = "INSERT INTO photos (nom_photo, lien_photo, id_categorie) VALUES (:nomphoto, :lienphoto, :idcategorie)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
}

?>