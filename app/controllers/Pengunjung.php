<?php


class Pengunjung extends Controller
{

    public function index()
    {

        if (!$_POST || $_POST['keyword'] == "") {
            $data['pengunjung'] = $this->model('Pengunjung_model')->selectAll();
        } else {
            $data['pengunjung'] = $this->model('Pengunjung_model')->cariBerdasarkanKeyword($_POST);
        }
        $data['judul'] = "Daftar Pengunjung";
        // $data['active'] = 'karyawan';
        $this->view('templates/headerhotel', $data);
        $this->view('pengunjung/index', $data);
        $this->view('templates/footerhotel');
    }

    public function tambah()
    {
        if (!$_POST) {
            header('Location: ' . BASEURL . 'pengunjung');
        }

        if ($this->model('Pengunjung_model')->tambahPengunjung($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . 'pengunjung');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'pengunjung');
            exit;
        }
    }
}
