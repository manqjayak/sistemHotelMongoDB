<?php

class Kamar extends Controller
{

    public function index()
    {

        $data['judul'] = "Daftar Kamar";
        $data['active'] = 'kamar';
        // $data['nama'] = $this->model('User_model')->getUser();
        $data['kamar'] = $this->model('Kamar_model')->selectAll();
        $this->view('templates/headerhotel', $data);
        $this->view('kamar/index', $data);
        $this->view('templates/footerhotel');
    }

    public function tambah()
    {
        if (!$_POST) {
            header('Location: ' . BASEURL . 'kamar');
        }

        if ($this->model('Kamar_model')->tambahKamar($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . 'kamar');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'kamar');
            exit;
        }
    }


    public function ubah()
    {

        if ($this->model('Kamar_model')->ubahKamar($_POST) > 0) {
            // return Flasher::setFlash('Berhasil', 'Diubah', 'success');
            $kata =  '  <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong> Berhasil </strong>Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ';
            echo $kata;
        } else {
            // Flasher::setFlash('gagal', 'Diubah', 'danger');
            // header('Location: ' . BASEURL . 'kamar');
            // exit;
            $kata =  '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data <strong> Gagal </strong>Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ';
            echo $kata;
        }
    }
}
