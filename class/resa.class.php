<?php

class Reservation
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getNombreReservation()
    {
        $sql = "SELECT COUNT(id_resa) AS nbResas FROM reservations";
        $stmt = $this->con->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nbResas'];
    }

    public function getNombreResaDuJour()
    {
        $sql = "SELECT COUNT(id_resa) AS nbResas FROM reservations WHERE date_resa = CURDATE()";
        $stmt = $this->con->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nbResas'];
    }

    public function getReservations()
    {
        $sql = "SELECT * FROM reservations";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function setReservation($idclient)
    {
        $data = [
            ":idclient" => $idclient
        ];
        $sql = "INSERT INTO reservations (date_resa, id_client) VALUES (CURDATE(), :idclient)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function setDateResa($ddeb, $dfin, $idclient, $idresa)
    {
        $data = [
            ":datedebut" => $ddeb,
            ":datefin" => $dfin,
            ":idclient" => $idclient,
            ":idresa" => $idresa
        ];
        $sql = "INSERT INTO dater (id_categorie, id_reservation, date_debut_resa, date_fin_resa) VALUES ()";
    }
}
