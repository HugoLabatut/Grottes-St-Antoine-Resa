<?php

class Client
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getNombreClients()
    {
        $sql = "SELECT COUNT(id_client) AS nbClients FROM clients";
        $stmt = $this->con->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nbClients'];
    }

    public function getClients()
    {
        $sql = "SELECT * FROM clients";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function getClientByReservation($idresa)
    {
        $data = [":idresa" => $idresa];
        $sql = "SELECT c.nom_client, c.prenom_client FROM clients AS c 
        INNER JOIN reservations AS r ON r.id_client = c.id_client
        INNER JOIN dater AS d ON d.id_resa = r.id_resa
        WHERE r.id_resa = :idresa";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nom_client']." ".$row['prenom_client'];
    }

    public function setClient($n, $p, $rs, $mail, $tel, $adr, $cp, $vil)
    {
        $data = [
            ":nom" => $n,
            ":prenom" => $p,
            ":raisonsoc" => $rs,
            ":mail" => $mail,
            ":tel" => $tel,
            ":adresse" => $adr,
            ":cp" => $cp,
            ":ville" => $vil
        ];
        $sql = "INSERT INTO clients (nom_client, prenom_client, raison_sociale_client, mail_client, tel_client, adresse_client, cp_client, ville_client) VALUES (:nom, :prenom, :raisonsoc, :mail, :tel, :adresse, :cp, :ville)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }
}
