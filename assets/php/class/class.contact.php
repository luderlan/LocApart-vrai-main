<?php
class Contact
{
    //variables
    private $con;
    private $id_contact;
    private $prenomC;
    private $nomC;
    private $emailC;
    private $telephoneC;
    private $MessageC;
    private $date_creationC;


    //constructeur
    public function __construct($c)
    {
        $this->con = $c;
    }


    //getters
    public function getIdContact()
    {
        return $this->id_contact;
    }
    public function getPrenomC()
    {
        return $this->prenomC;
    }
    public function getNomC()
    {
        return $this->nomC;
    }
    public function getMailC()
    {
        return $this->emailC;
    }
    public function getTelC()
    {
        return $this->telephoneC;
    }
    public function getMessageC()
    {
        return $this->MessageC;
    }
    public function getDateC()
    {
        return $this->date_creationC;
    }


    //setters
    public function setPrenomC($l)
    {
        $this->prenomC = $l;
    }
    public function setNomC($l)
    {
        $this->nomC = $l;
    }
    public function setMailC($l)
    {
        $this->emailC = $l;
    }
    public function setTelC($l)
    {
        $this->telephoneC = $l;
    }
    public function setMessageC($l)
    {
        $this->MessageC = $l;
    }
    public function setDateC($l)
    {
        $this->date_creationC = $l;
    }


    //Méthodes
    public function insertContact($prenom,$nom,$mail,$tel,$msg)
    {
        $data = [
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":mail" => $mail,
            ":tel" => $tel,
            ":msg" => $msg
        ];

        $sql = "INSERT INTO contact (prenomC, nomC, emailC, telephoneC, MessageC)
        VALUES (:prenom, :nom, :mail, :tel, :msg)";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }
}
?>