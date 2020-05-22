<?php


class Status_model
{

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function selectAll()
    {
        $this->db->query("SELECT * FROM status_kunci ORDER BY status ASC");
        $this->db->execute();
        return $this->db->resultSet();
    }


    public function ubah($data)
    {
        $query = "UPDATE status_kunci
        SET
        status = :status
        WHERE id= :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
