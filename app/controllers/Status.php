<?php


class Status extends Controller
{

    public function index()
    {

        $data['judul'] = "Status Kunci";
        $data['status'] = $this->model('Status_model')->selectAll();
        $this->view('templates/headerhotel', $data);
        $this->view('status/index', $data);
        $this->view('templates/footerhotel');
    }
    public function ubah()
    {
        if ($this->model('Status_model')->ubah($_POST) > 0) {

            $kata =  '  <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong> Berhasil </strong>Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ';
            echo $kata;
        } else {

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
