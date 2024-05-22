<?php

class BAR
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getBAR()
    {
        $sql = "SELECT id_bar, lib_bar, date_debut_bar, date_fin_bar, pourcentage_bar FROM bar";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function getBARByDates($ddeb, $dfin)
    {
        $data = [
            ":ddeb" => $ddeb,
            ":dfin" => $dfin
        ];
        $sql = "SELECT DATE_FORMAT(date_debut_bar, '%d-%m'), DATE_FORMAT(date_fin_bar, '%d-%m') FROM bar WHERE DATE_FORMAT(date_debut_bar, '%d-%m') = DATE_FORMAT(:ddeb, '%d-%m') AND DATE_FORMAT(date_fin_bar, '%d-%m') = DATE_FORMAT(:dfin, '%d-%m')";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function setBAR($lib, $ddeb, $dfin, $pct)
    {
        $data = [
            ":lib" => $lib,
            ":ddeb" => $ddeb,
            ":dfin" => $dfin,
            ":pct" => $pct
        ];
        $sql = "INSERT INTO bar (lib_bar, date_debut_bar, date_fin_bar, pourcentage_bar) VALUES (:lib, :ddeb, :dfin, :pct)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }
}

