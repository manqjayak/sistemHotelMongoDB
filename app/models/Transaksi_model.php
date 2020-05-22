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
        $this->db->query('SELECT a.no_transaksi, b.nama as namaKaryawan, c.nama as namaPengunjung, a.tanggal_masuk,a.tanggal_keluar,a.lama_menginap,a.total_harga
        FROM transaksi a 
        INNER JOIN karyawan b on b.id_karyawan = a.id_karyawan
        INNER JOIN pengunjung c on c.id_pengunjung = a.id_pengunjung
        ORDER BY a.total_harga DESC');
        return $this->db->resultSet();
    }
    public function statusKamar()
    {
        $this->db->query('SELECT a.no_kamar, a.jenis_kamar, a.harga 
        from kamar a where `status`( ' . date('Y-m-d') . ',a.no_kamar) = 1');
        return $this->db->resultSet();
    }
    public function tambahTransaksi($data, $id)
    {


        $query = "INSERT INTO transaksi
        VALUES
        ('',:idpengunjung,:idkaryawan, :tanggalmasuk, :tanggalkeluar, :lamamenginap, :nokamar, :harga)";

        $this->db->query($query);

        $this->db->bind('idpengunjung', $id);
        $this->db->bind('idkaryawan', $data['idkaryawan']);
        $this->db->bind('tanggalmasuk', $data['tanggalmasuk']);
        $this->db->bind('tanggalkeluar', $data['tanggalkeluar']);
        $this->db->bind('lamamenginap', $data['lamamenginap']);
        $this->db->bind('nokamar', $data['nokamar']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getIdbyKTP($data)
    {
        $this->db->query('SELECT id_pengunjung from pengunjung where no_ktp=:ktp');
        $this->db->bind('ktp', $data);
        return $this->db->resultSet();
    }

    public function getHarga($data)
    {
        $this->db->query('SELECT harga from kamar where no_kamar = :harga');
        $this->db->bind('harga', $data['nokamar']);
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
