<?php
class Reservation
{
    private $con;
    private $id_reservation;
    private $titre;
    private $date_rese;
    private $start;
    private $end;
    private $commentaire;
    private $moderation;
    private $annulation;
    private $id_bien;
    private $id_client;


    //constructeur
    public function __construct($c)
    {
        $this->con = $c;
    }


    //getters
    public function getIdReservation()
    {
        return $this->id_reservation;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function getDateRese()
    {
        return $this->date_rese;
    }
    public function getDadRese()
    {
        return $this->start;
    }
    public function getDafRese()
    {
        return $this->end;
    }
    public function getComm()
    {
        return $this->commentaire;
    }
    public function getMod()
    {
        return $this->moderation;
    }
    public function getAnnulation()
    {
        return $this->annulation;
    }
    public function getIdBien()
    {
        return $this->id_bien;
    }
    public function getIdClient()
    {
        return $this->id_client;
    }


    //setters
    public function setTitre($l)
    {
        $this->titre = $l;
    }
    public function setDateRese($l)
    {
        $this->date_rese = $l;
    }
    public function setDadRese($l)
    {
        $this->start = $l;
    }
    public function setDafRese($l)
    {
        $this->end = $l;
    }
    public function setComm($l)
    {
        $this->commentaire = $l;
    }
    public function setModeration($l)
    {
        $this->moderation = $l;
    }
    public function setAnnulation($l)
    {
        $this->annulation = $l;
    }
    public function setIdBien($l)
    {
        $this->id_bien = $l;
    }
    public function setIdClient($l)
    {
        $this->id_client = $l;
    }


    //Fonctions
    public function selectRes()
    {
        $sql = "SELECT * FROM reservation";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function insertRes($titre,$date,$s,$e,$comm,$mod,$ann,$idb,$idc)
    {
        $data = [
            ":titre" => $titre,
            ":dateRes" => $date,
            ":start" => $s,
            ":end" => $e,
            ":comm" => $comm,
            ":mod" => $mod,
            ":ann" => $ann,
            ":idb" => $idb,
            ":idc" => $idc
        ];

        $start = date('Y-m-d H:i:s', strtotime($s));
        $end = date('Y-m-d H:i:s', strtotime($e));


        $sql = "INSERT INTO reservation (titre,date_rese,start,end,commentaire,moderation,annulation,id_bien,id_client)
        VALUES (:titre,:dateRes,:start,:end,:comm,:mod,:ann,:idb,:idc)";


        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function updateRes($id,$titre,$date,$s,$e,$comm,$mod,$ann,$idb,$idc)
    {
        $data = [
            ":idres" => $id,
            ":titre" => $titre,
            ":date" => $date,
            ":dad" => $s,
            ":daf" => $e,
            ":comm" => $comm,
            ":mod" => $mod,
            ":ann" => $ann,
            ":idb" => $idb,
            ":idc" => $idc,
        ];

        $sql = "UPDATE reservation
        SET titre = :titre, date = :date, start = :dad, end = :daf, comm = :comm, mod = :mod, ann = :ann, idb = :idb, idc = :idc
        WHERE id_reservation = :idres";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteRes($id)
    {
        $data = [":idres" => $id];

        $sql = "DELETE FROM reservation WHERE id_reservation = :idres";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function selectResById($id)
    {
        $data = [":idres" => $id];

        $sql = "SELECT * FROM type_bien WHERE id_reservation = :idres   d";
        
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }

    public function selectbien(){
        $sql="SELECT * FROM biens;";
        $executesql = $this->con->query($sql);                   
        return $executesql;
    }

    public function selectClient(){
        $sql="SELECT * FROM clients;";
        $executesql = $this->con->query($sql);                   
        return $executesql;
    }
}
?>