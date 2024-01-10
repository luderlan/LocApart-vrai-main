<?php
class tarif
{
    private $con;
    private $id_tarif;
    private $dd_tarif;
    private $df_tarif;
    private $prix_loc;
    private $id_bien;


    //constructeur
    public function __construct($c)
    {
        $this->con = $c;
    }


    //getters
    public function getid_tarif()
    {
        return $this->id_tarif;
    }
    public function getdd_tarif()
    {
        return $this->dd_tarif;
    }
    public function getdf_tarif()
    {
        return $this->df_tarif;
    }
    public function getprix_loc()
    {
        return $this->prix_loc;
    }
    public function getid_bien()
    {
        return $this->id_bien;
    }


    //setters
    public function setdd_tarif($dd)
    {
        $this->dd_tarif = $dd;
    }
    public function setdf_tarif($df)
    {
        $this->df_tarif = $df;
    }
    public function setprix_loc($p)
    {
        $this->prix_loc = $p;
    }
    public function setid_bien($idb)
    {
        $this->id_bien = $idb;
    }


    //Méthodes
    public function selectTarif()
    {
        $sql = "SELECT * FROM tarif";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function insertTarif($dd, $df, $p, $idb)
    {
        $data = [
            ":dd_tarif" => $dd,
            ":df_tarif" => $df,
            ":prix_loc" => $p ,
            ":id_bien" => $idb
        ];

        $sql = "INSERT INTO tarif (dd_tarif, df_tarif, prix_loc, id_bien)
        VALUES (:dd_tarif, :df_tarif, :prix_loc, :id_bien)";
        
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function updateTarif($id, $dd, $df, $p, $idb)
    {
        $data = [
            ":dd_tarif" => $dd,
            ":df_tarif" => $df,
            ":prix_loc" => $p ,
            ":id_bien" => $idb
        ];

        $sql = "UPDATE tarif SET dd_tarif = :dd_tarif, df_tarif = :dd_tarif, prix_loc = :prix_loc, id_bien = :id_bien  WHERE id_tarif = $id";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteTarif($id)
    {
        $data = [":id_tarif" => $id];

        $sql = "DELETE FROM tarif WHERE id_tarif = :id_tarif";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function selectById($id)
    {
        $data = [":id_tarif" => $id];

        $sql = "SELECT dd_tarif, df_tarif, prix_loc, id_bien FROM tarif WHERE id_tarif = :id_tarif";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }

    public function selectByIdBien($id)
    {
        $data = [":id_bien" => $id];

        $sql = "SELECT dd_tarif, df_tarif, prix_loc FROM tarif WHERE id_bien = :id_bien";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
}
?>