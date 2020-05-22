<?php

class Transaksi extends Controller
{

    public function index()
    {
        $data['judul'] = "Transaksi";
        $data['nokamar'] = $this->model('Transaksi_model')->statusKamar();

        $this->view('templates/headerhotel', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footerhotel');
    }

    public function daftarTransaksi()
    {

        $data['judul'] = "Daftar Transaksi";
        $data['daftar'] = $this->model('Transaksi_model')->selectAll();
        $this->view('templates/headerhotel', $data);
        $this->view('transaksi/daftarTransaksi', $data);
        $this->view('templates/footerhotel');
    }

    public function tambahTransaksi()
    {
        if (!$_POST) {
            header('Location: ' . BASEURL . 'transaksi');
        }
        $id = $this->model('Transaksi_model')->getIdbyKTP($_POST['noktp']);
        $id = $id[0]['id_pengunjung'];
        if ($this->model('Transaksi_model')->tambahTransaksi($_POST, $id) > 0) {
            Flasher::setFlash('Berhasil', 'Dipesan', 'success');
            header('Location: ' . BASEURL . 'transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Dipesan', 'danger');
            header('Location: ' . BASEURL . 'transaksi');
            exit;
        }
    }
    public function getharga()
    {

        $harga = $this->model('Transaksi_model')->getHarga($_POST);
        $harga = $harga[0]['harga'];
        echo $harga;
    }

    public function lihatKamar()
    {
        $id = $_POST['id'];
        $data = $this->model('Transaksi_model')->selectByNoKamar($id);

        $kata = '';
        $kata .= " <table class='table'>
        <thead>
            <tr>
                <th scope='col'>No Kamar</th>
                <th scope='col'>Jenis Kamar</th>
                <th scope='col'>harga</th>
      
            </tr>
        </thead>
        <tbody>";

        foreach ($data as $k) {
            $kata .= "    <tr>
                 <th > " . $k['no_kamar'] . "</th>
            <td>" . $k['jenis_kamar'] . "</td>
                <td>" . $k['harga'] . "</td>

             </tr>";
        }


        $kata .= "
        </tbody>
    </table>";
        echo $kata;
    }


    public function riwayatTransaksi()
    {

        if (!$_POST || $_POST['tanggal'] == "") {
            $data['riwayat'] = $this->model('Transaksi_model')->selectRiwayat();
        } else {
            $data['riwayat'] = $this->model('Transaksi_model')->cariBerdasarkanTanggal($_POST);
        }

        $data['judul'] = "Riwayat Transaksi";

        $this->view('templates/headerhotel', $data);
        $this->view('transaksi/riwayatTransaksi', $data);
        $this->view('templates/footerhotel');
    }


    public function cekKTP()
    {
        $kata = '';
        $banyak = $this->model('Transaksi_model')->cekPengunjung($_POST);
        $banyak = $banyak['0']['banyak'];
        if ($banyak > 0) {
            $kata .= '<small class="ml-2 text-success" id="tempatktp2">pengunjung telah terdaftar</small>';

            echo $kata;
        } else {
            $kata .= '<small class="ml-2 text-danger" id="tempatktp2">pengunjung belum terdaftar, <a href="' . BASEURL . 'pengunjung"> daftar disini</a> </small>';

            echo $kata;
        }
    }
}
