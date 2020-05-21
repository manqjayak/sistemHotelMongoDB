<?php


class Kamar_model
{

    private $table = 'kamar';
    private $db;

    public function __construct()
    {

        $this->db = new Database;
    }

    public function selectAll()
    {
        $this->db->query('SELECT a.no_kamar, a.jenis_kamar, a.harga , IF(`status`(' . date('Y-m-d') . ',a.no_kamar)=1,"Kosong","Terpakai") AS ketersediaan
        from kamar a');
        return $this->db->resultSet();
    }
    public function tambahKamar($data)
    {


        $query = "INSERT INTO kamar
        VALUES
        (:nokamar,:jeniskamar, :harga)";

        $this->db->query($query);

        $this->db->bind('nokamar', $data['nokamar']);
        $this->db->bind('jeniskamar', $data['jeniskamar']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahKamar($data)
    {

        $query = "UPDATE kamar
                    SET
                    no_kamar = :nokamar,
                    jenis_kamar= :jeniskamar,
                    harga= :harga
                    WHERE no_kamar = :nokamar";

        $this->db->query($query);
        $this->db->bind('nokamar', $data['nokamar']);
        $this->db->bind('jeniskamar', $data['jeniskamar']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
