<?php

class Pengunjung_model
{


    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function selectAll()
    {
        $this->db->query("SELECT id_pengunjung, UPPER(nama) as nama, alamat, jk, no_hp, no_ktp FROM pengunjung");
        return $this->db->resultSet();
    }

    public function cariBerdasarkanKeyword($data)
    {
        $keyword = $data['keyword'];
        $this->db->query("SELECT id_pengunjung, UPPER(nama) as nama, alamat, jk, no_hp, no_ktp FROM pengunjung where (no_ktp = :keyword1) OR (nama LIKE :keyword) ");
        $this->db->bind('keyword1', $data['keyword']);
        $this->db->bind('keyword', '%' . $keyword . '%');
        return $this->db->resultSet();
    }

    public function cariBerdasarkanTanggal($data)
    {
        $keyword = $data['keyword'];
        $this->db->query("SELECT
        UPPER( pengunjung.nama) as nama,
         pengunjung.alamat,
         pengunjung.jk,
         pengunjung.no_hp,
         pengunjung.no_ktp,
         transaksi.tanggal_masuk,
         transaksi.tanggal_keluar
     FROM
         transaksi
     INNER JOIN pengunjung ON transaksi.id_pengunjung = pengunjung.id_pengunjung where (no_ktp = :keyword1 OR nama LIKE :keyword) AND tanggal_masuk = :tanggal");
        $this->db->bind('keyword1', $data['keyword']);
        $this->db->bind('keyword', '%' . $keyword . '%');
        $this->db->bind('tanggal', $data['tanggal']);
        return $this->db->resultSet();
    }


    public function tambahPengunjung($data)
    {


        $query = "INSERT INTO pengunjung
        VALUES
        ('',:nama,:alamat, :jeniskelamin,:nohp,:noKTP)";

        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('nohp', $data['NoHP']);
        $this->db->bind('noKTP', $data['noKTP']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
