<?php

class Categorie
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function getCategorieByID($id)
    {
        $data = [':idc' => $id];
        $sql = "SELECT * FROM categories WHERE id_categorie = :idc";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }

    public function getCategorieLibByID($id)
    {
        $data = [':idc' => $id];
        $sql = "SELECT lib_categorie FROM categories WHERE id_categorie = :idc";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['lib_categorie'];
    }

    public function setCategorie($lib, $desc)
    {
        $data = [
            ":lib" => $lib,
            ":descrip" => $desc
        ];
        $sql = "INSERT INTO categories (lib_categorie, desc_categorie) VALUES (:lib, :descrip)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function setCategorieById($idc, $libc, $descc)
    {
        $data = [
            ":id" => $idc,
            ":lib" => $libc,
            ":descr" => $descc
        ];
        $sql = "UPDATE categories SET lib_categorie = :lib, desc_categorie = :descr WHERE id_categorie = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }
}
