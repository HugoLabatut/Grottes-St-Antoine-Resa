<?php 
class Administrateur
{
    private $con;

    public function __construct($c)
    {
        $this->con = $c;
    }

    public function getAdminByNom($nom)
    {
        $data = [":nomadmin" => $nom];
        $sql = "SELECT nom_admin FROM administrateur WHERE nom_admin = :nomadmin";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nom_admin'];
    }

    public function getAdminByID($id)
    {
        $data = [":idadmin" => $id];
        $sql = "SELECT * FROM administrateur WHERE id_admin = :idadmin";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id_admin'];
    }

    public function getAdminPasswordByNom($nom)
    {
        $data = [":nomadmin" => $nom];
        $sql = "SELECT mdp_admin FROM administrateur WHERE nom_admin = :nomadmin";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['mdp_admin'];
    }

    public function setAdminNouvMDP($nom_admin, $nouv_mdp)
    {
        $nouv_mdp_hache = sha1($nouv_mdp);
        $data = [":nouvmdp" => $nouv_mdp_hache, ":nomadmin" => $nom_admin];
        $sql = "UPDATE administrateur SET mdp_admin = :nouvmdp WHERE nom_admin = :nomadmin";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }
}

?>