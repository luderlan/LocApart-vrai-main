<?php
class Client
{
    //variables
    private $con;
    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $rue_client;
    private $id_comm;
    private $mail_client;
    private $pass_client;
    private $statut_client;
    private $valid_client;

    //constructeur
    public function __construct($c)
    {
        $this->con = $c;
    }

    //getters
    public function getIdClient()
    {
        return $this->id_client;
    }

    public function getNomClient()
    {
        return $this->nom_client;
    }

    public function getPrenomClient()
    {
        return $this->prenom_client;
    }

    public function getRueClient()
    {
        return $this->rue_client;
    }

    public function getCodeComm()
    {
        return $this->id_comm;
    }

    public function getMailClient()
    {
        return $this->mail_client;
    }

    public function getPassClient()
    {
        return $this->pass_client;
    }

    public function getStatutClient()
    {
        return $this->statut_client;
    }

    public function getValidClient()
    {
        return $this->valid_client;
    }


    //setters
    public function setNomClient($l)
    {
        $this->nom_client = $l;
    }

    public function setPrenomClient($l)
    {
        $this->prenom_client = $l;
    }

    public function setRueClient($l)
    {
        $this->rue_client = $l;
    }

    public function SetCodeComm($l)
    {
        $this->id_comm = $l;
    }

    public function setMailClient($l)
    {
        $this->mail_client = $l;
    }

    public function setPassClient($l)
    {
        $this->pass_client = $l;
    }

    public function setValidClient($l)
    {
        $this->valid_client = $l;
    }

    //fonctions
    public function selectClient()
    {
        $sql = "SELECT * FROM clients";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function insertClient($nom,$prenom,$rue,$code,$mail,$pass,$statut,$valid)
    {
        $data = [
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":rue" => $rue,
            ":cod" => $code,
            ":mail" => $mail,
            ":mdp" => $pass,
            ":statut" => $statut,
            ":valide" => $valid
        ];

        $sql = "INSERT INTO clients (nom_client, prenom_client, rue_client,
        id_comm, mail_client, pass_client, statut_client, valid_client)

        VALUES (:nom, :prenom, :rue, :cod, :mail, :mdp, :statut, :valide)";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function insertClientInsc($nom,$prenom,$rue,$code,$mail,$pass)
    {
        $data = [
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":rue" => $rue,
            ":cod" => $code,
            ":mail" => $mail,
            ":mdp" => $pass,
        ];

        $sql = "INSERT INTO clients (nom_client, prenom_client, rue_client,
        id_comm, mail_client, pass_client)

        VALUES (:nom, :prenom, :rue, :cod, :mail, :mdp)";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function updateClient($id, $nom,$prenom,$rue,$code,$mail,$pass,$statut,$valid)
    {
        $data = [
            ":idc" => $id,
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":rue" => $rue,
            ":cod" => $code,
            ":mail" => $mail,
            ":mdp" => MD5($pass),
            ":statut" => $statut,
            ":valide" => $valid
        ];

        $sql = "UPDATE clients SET nom_client = :nom, prenom_client = :prenom, rue_client = :rue, id_comm = :cod,
        mail_client = :mail, pass_client = :mdp, statut_client = :statut, valid_client = :valide
        WHERE id_client = :idc";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteClient($id)
    {
        $data = [":idc" => $id];

        $sql = "DELETE FROM clients WHERE id_client = :idc";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function selectById($id)
    {
        $data = [":idc" => $id];

        $sql = "SELECT nom_client,prenom_client,rue_client, id_comm,mail_client,pass_client,statut_client,valid_client
        FROM clients 
        WHERE id_client = :idc";
        
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
}
?>