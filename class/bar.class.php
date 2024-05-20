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
        $sql = "SELECT id_bar, substr(date_debut_bar, 0, 7), substr(date_fin_bar, 0, 7), pourcentage_bar FROM bar";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function getBARByDates($ddeb, $dfin)
    {
        $data = [
            ":ddeb" => $ddeb,
            ":dfin" => $dfin
        ];
        $sql = "SELECT * FROM bar WHERE date_debut_bar = :ddeb AND date_fin_bar = :dfin";
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

