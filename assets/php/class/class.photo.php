<?php
class Photo
{
    private $con;
    private $id_photo;
    private $nom_photo;
    private $lien_photo;
    private $id_bien;       

    //constructeur
    public function __construct($c)
    {
        $this->con = $c;
    }


    //getters
    public function getIdPhoto()
    {
        return $this->id_photo;
    }
    public function getNomPhoto()
    {
        return $this->nom_photo;
    }
    public function getLienPhoto()
    {
        return $this->lien_photo;
    }
    public function getIdBien()
    {
        return $this->id_bien;
    }


    //setters
    public function setNomPhoto($l)
    {
        $this->nom_photo = $l;
    }
    public function setLienPhoto($l)
    {
        $this->lien_photo = $l;
    }
    public function setIdbien($l)
    {
        $this->id_bien = $l;
    }


    //fonctions
    public function selectPhoto()
    {
        $sql = "SELECT * FROM photos";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function insertPhoto($nom,$lien,$id_bien)
    {
        $data = [
            ":nom" => $nom,
            ":lien" => $lien,
            ":bien" => $id_bien
        ];

        $sql = "INSERT INTO photos (nom_photo, lien_photo, id_bien)
        VALUES (:nom, :lien, :bien)";


        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function updatePhoto($id, $nom,$lien,$bien)
    {
        $data = [
            ":idp" => $id,
            ":nom" => $nom,
            ":lien" => $lien,
            ":bien" => $bien
        ];

        $sql = "UPDATE photos SET nom_photo = :nom, lien_photo = :lien, id_bien = :bien
        WHERE id_photo = :idp";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function deletePhoto($id)
    {
        $data = [":idp" => $id];

        $sql = "DELETE FROM photos WHERE id_photo = :idp";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function selectByIdPhoto($id)
    {
        $data = [":idp" => $id];

        $sql = "SELECT nom_photo,lien_photo,id_bien
        FROM photos 
        WHERE id_photo = :idp";
        
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }

    public function selectIdBien(){
        $sql="SELECT * FROM biens;";
        $executesql = $this->con->query($sql);                   
        return $executesql;
    }
}
?>    
