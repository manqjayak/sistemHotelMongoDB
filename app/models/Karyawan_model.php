<?php


class Karyawan_model
{

    private $table = 'karyawan';
    private $db;

    public function __construct()
    {

        $this->db = new Database;
    }

    public function selectAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahKaryawan($data)
    {


        $query = "INSERT INTO karyawan
        VALUES
        (:idkaryawan,:nama, :jeniskelamin,:alamat,:notlp)";

        $this->db->query($query);

        $this->db->bind('idkaryawan', $data['idkaryawan']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('notlp', $data['notlp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahKaryawan($data)
    {

        $query = "UPDATE karyawan
                    SET
                    nama = :nama,
                    jk= :jk,
                    alamat= :alamat,
                    no_hp = :no_hp
                    WHERE id_karyawan = :id_karyawan";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('id_karyawan', $data['id_karyawan']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
