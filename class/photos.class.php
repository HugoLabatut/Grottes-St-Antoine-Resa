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
        $stmt = $this->con->prepare($sql);
        $row = $stmt->execute();
        return $row;
    }

    public function getLienPhotoByCategorie($idcat)
    {
        $data = [":idcategorie" => $idcat];
        $sql = "SELECT lien_photo FROM photos WHERE id_categorie = :idcategorie";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
}

?>