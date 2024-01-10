<?php
class type_bien
{
    private $con;
    private $id_type_bien;
    private $lib_type_bien;


    //constructeur
    public function __construct($c)
    {
        $this->con = $c;
    }


    //getters
    public function getid_type_bien()
    {
        return $this->id_type_bien;
    }
    public function getlib_type_bien()
    {
        return $this->lib_type_bien;
    }


    //setters
    public function setlib_type_bien($l)
    {
        $this->lib_type_bien = $l;
    }


    //Méthodes
    public function selectTypeBien()
    {
        $sql = "SELECT * FROM type_bien";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function insertTypeBien($l)
    {
        $data = [":lib_type_bien" => $l];

        $sql = "INSERT INTO type_bien (lib_type_bien) VALUES (:lib_type_bien)";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function updateTypeBien($id, $l)
    {
        $data = [
            ":id_type_bien" => $id,
            ":lib_type_bien" => $l
        ];

        $sql = "UPDATE type_bien SET lib_type_bien = :lib_type_bien WHERE id_type_bien = :id_type_bien";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteTypeBien($id)
    {
        $data = [":id_type_bien" => $id];

        $sql = "DELETE FROM type_bien WHERE id_type_bien = :id_type_bien";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function selectByIdTypeBien($id)
    {
        $data = [":id_type_bien" => $id];

        $sql = "SELECT lib_type_bien FROM type_bien WHERE id_type_bien = :id_type_bien";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
}
?>