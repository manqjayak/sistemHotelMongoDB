<?php


class Contact extends Controller
{

    public function index()
    {

        $data['judul'] = "Contact";
        $data['contact'] = $this->model('Contact_model')->getAllContact();
        $this->view('templates/header', $data);
        $this->view('contact/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {

        $data['judul'] = "Detail Contact";
        $data['contact'] = $this->model('Contact_model')->getContactbyID($id);
        $this->view('templates/header', $data);
        $this->view('contact/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Contact_model')->tambahContact($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . 'contact');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'contact');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Contact_model')->hapusContact($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . 'contact');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . 'contact');
            exit;
        }
    }

    public function getedit()
    {
        echo json_encode($this->model('contact_model')->getContactbyID($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Contact_model')->ubahContact($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diubah', 'success');
            header('Location: ' . BASEURL . 'contact');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . 'contact');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = "Contact";
        $data['contact'] = $this->model('Contact_model')->cariContact();
        $this->view('templates/header', $data);
        $this->view('contact/index', $data);
        $this->view('templates/footer');
    }
}
