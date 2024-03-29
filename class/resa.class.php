<?php

include("chambres.class.php");

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
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function getReservationsDatesByClient()
    {
        $sql = "SELECT * FROM dater";
        $stmt = $this->con->query($sql);
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

    public function setDateResa($ddeb, $dfin, $idcate, $idresa)
    {
        $oChambreCate = new Chambre($this->con);
        $lesChambres = $oChambreCate->getChambreByCategorie($idcate);
        $i = 0;
        foreach ($lesChambres as $uneChambre) {
            while ($uneChambre['etat_resa_chambre'] != 0) {
                $i++;
                if ($uneChambre['etat_resa_chambre'] == 0 and $uneChambre['id_categorie'] == $idcate) {
                    $data = [
                        ":datedebut" => $ddeb,
                        ":datefin" => $dfin,
                        ":idcate" => $idcate,
                        ":idresa" => $idresa,
                        ":idcha" => $uneChambre['id_chambre']
                    ];
                    $sql = "INSERT INTO dater (id_categorie, id_reservation, id_chambre, date_debut_resa, date_fin_resa) VALUES (:idcate, :idresa, :idcha, :datedebut, :datefin)";
                    $stmt = $this->con->prepare($sql);
                    $stmt->execute($data);
                }
            }
        }
    }
}
