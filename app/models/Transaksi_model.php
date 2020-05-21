<?php


class Transaksi_model
{
    private $table = 'transaksi';
    private $db;

    public function __construct()
    {

        $this->db = new Database;
    }

    public function selectAll()
    {
        $this->db->query('SELECT a.no_transaksi, b.nama as namaKaryawan, c.nama as namaPengunjung, a.jumlah_kamar,a.tanggal_masuk,a.tanggal_keluar,a.lama_menginap,a.total_harga
        FROM transaksi a 
        INNER JOIN karyawan b on b.id_karyawan = a.id_karyawan
        INNER JOIN pengunjung c on c.id_pengunjung = a.id_pengunjung
        ORDER BY a.total_harga DESC');
        return $this->db->resultSet();
    }

    public function selectByNoKamar($id)
    {
        $this->db->query('call tampilDetailTransaksi(' . $id . ')');
        return $this->db->resultSet();
    }
}