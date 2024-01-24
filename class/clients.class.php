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
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}
