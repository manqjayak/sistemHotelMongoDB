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

    public function selectRiwayat()
    {
        $this->db->query('SELECT * FROM cekid');
        return $this->db->resultSet();
    }

    public function cariBerdasarkanTanggal($data)
    {

        $this->db->query('SELECT * FROM cekid WHERE tanggal_masuk = :tanggal');
        $this->db->bind('tanggal', $data['tanggal']);
        return $this->db->resultSet();
    }

    public function cekPengunjung($data)
    {
        $this->db->query("SELECT COUNT(*) as banyak FROM pengunjung WHERE no_ktp = :noktp");
        $this->db->bind("noktp", $data['noktp']);
        return $this->db->resultSet();
    }
}
