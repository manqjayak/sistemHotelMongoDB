<?php

class Karyawan extends Controller
{

    public function index()
    {
        $data['judul'] = "Daftar Karyawan";
        $data['active'] = 'karyawan';
        // $data['nama'] = $this->model('User_model')->getUser();
        $data['karyawan'] = $this->model('Karyawan_model')->selectAll();
        $this->view('templates/headerhotel', $data);
        $this->view('karyawan/index', $data);
        $this->view('templates/footerhotel');
    }


    public function tambah()
    {
        if (!$_POST) {
            header('Location: ' . BASEURL . 'karyawan');
        }

        if ($this->model('Karyawan_model')->tambahKaryawan($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . 'karyawan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'karyawan');
            exit;
        }
    }

    public function ubah()
    {
        
        if ($this->model('Karyawan_model')->ubahKaryawan($_POST) > 0) {
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
