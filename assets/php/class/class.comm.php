<?php
class Communes
{
    //variables
    private $con;
    private $COL1;
    private $COL3;
    private $COL10;


    //constructeur
    public function __construct($c)
    {
        $this->con = $c;
    }


    //getters
    public function getIdCommune()
    {
        return $this->COL1;
    }
    public function getCp()
    {
        return $this->COL3;
    }
    public function getNomCommune()
    {
        return $this->COL10;
    }

    
    //setters
    public function setCp($l)
    {
        $this->COL3 = $l;
    }
    public function setNomCommune($l)
    {
        $this->COL10 = $l;
    }


    //Fonctions
    public function getCommById($id)
    {
        $data = [":idcom" => $id];

        $sql = "SELECT COL3,COL10,COL13
        FROM communes_departement_region 
        WHERE COL1 = :idcom";
        
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }

    public function selectCommune()
    {
        $sql = "SELECT * FROM communes_departement_region";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

}
?>