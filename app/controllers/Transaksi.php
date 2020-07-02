<?php

class Transaksi extends Controller
{

    public function index()
    {
        $data['judul'] = "Transaksi";
        $data['nokamar'] = $this->model('Kamar_model')->statusKamar();
        $this->view('templates/headerhotel', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footerhotel');
    }

    public function tambahTransaksi()
    {
        if (!$_POST) {
            header('Location: ' . BASEURL . 'transaksi');
        }
  
        if ($this->model('Transaksi_model')->tambahTransaksi($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Dipesan', 'success');
            header('Location: ' . BASEURL . 'transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'Dipesan', 'danger');
            header('Location: ' . BASEURL . 'transaksi');
            exit;
        }
    }
    //ajax untuk mendapatkan harga
    public function getharga()
    {
       
        $harga = $this->model('Kamar_model')->getHarga($_POST['nokamar']);
        echo json_encode($harga);
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
        if (!$_POST) {
            $data['riwayat'] = $this->model('Transaksi_model')->selectAll();
        } else {
            $data['riwayat'] = $this->model('Transaksi_model')->cariBerdasarkanKeyword($_POST);
        }
        
        $data['judul'] = "Riwayat Transaksi";

        $this->view('templates/headerhotel', $data);
        $this->view('transaksi/riwayatTransaksi', $data);
        $this->view('templates/footerhotel');
    }

//ajax cek ktp di transaksi
    public function cekKTP()
    {
        $kata = '';
        $banyak = $this->model('Pengunjung_model')->cekPengunjung($_POST);
    
        if (!is_null($banyak)) {
            $kata .= '<small class="ml-2 text-success" id="tempatktp2">pengunjung telah terdaftar</small>
                <input type="hidden" id="nama" value="'.$banyak['nama'].'">
                <input type="hidden" id="no_hp" value="'.$banyak['no_hp'].'">
            '
            ;

            echo $kata;
        } else {
            $kata .= '<small class="ml-2 text-danger" id="tempatktp2">pengunjung belum terdaftar, <a href="' . BASEURL . 'pengunjung"> daftar disini</a> </small>';

            echo $kata;
        }
    }

    //untuk riwayat
    public function pDetail(){

        $data = $this->model('Transaksi_model')->getPengunjung($_POST);
        $kata = '          <table class="table">
        <thead>
            <th>nama</th>
            <th>no HP</th>
            <th>KTP</th>
        </thead>
        <tbody>
            <tr>
                <td>'.$data['pengunjung']['nama'].'</td>
                <td>'.$data['pengunjung']['no_hp'].'</td>
                <td>'.$data['pengunjung']['no_ktp'].'</td>
            </tr>
        </tbody>
    </table>';
        echo $kata;
        
    }
    //kamar
    //menampilkan data-data dari kamar beserta status kuncinya
    public function kDetail(){
        $data = $this->model('Transaksi_model')->getKamar($_POST);
        $kata = '
       <div>    <input type="hidden" name="id" value='.$_POST['id'].' >
                <input type="hidden" name="no_kamar" value='.$data['kamar']['no_kamar'].' >
       </div>
        <table class="table">
        <thead>
            <th>no kamar</th>
            <th>jenis kamar</th>
            <th>kunci</th>
            <th>harga</th>
        </thead>
        <tbody>
            <tr>
                <td>'.$data['kamar']['no_kamar'].'</td>
                <td>'.$data['kamar']['jenis_kamar'].'</td>
                ';
            if($data['kamar']['kunci']=='belum'){
                $kata .='      <td>    <select class="form-control" id="kunci" name="kunci">
                <option value="belum" selected>belum</option>
                <option valuue="sudah">sudah</option> 
                </select></td>';
            }else{
                $kata .= '<td>sudah</td>';
            }
            $kata .='         
                <td>'.$data['kamar']['harga'].'</td>
            </tr>
        </tbody>
    </table>

    ';
    echo $kata;
    }

    //ini untuk mengedit status yang terdapat di suatu kamar
    public function tambahkDetail(){
    
        if (count($_POST)==2) {
            header('Location: ' . BASEURL . 'transaksi/riwayatTransaksi');
        }else{
            if($_POST['kunci']=='sudah'){
                $status=  $this->model("Transaksi_model")->EditStatusKunci($_POST);
                if($status>0){
                     Flasher::setFlash('Berhasil', 'Diubah', 'success');
                     header('Location: ' . BASEURL . 'transaksi/riwayatTransaksi');
                     exit;
                }
             }else{
                 Flasher::setFlash('tidak', 'Dibuah', 'warning');
             header('Location: ' . BASEURL . 'transaksi/riwayatTransaksi');
             exit;
            }
        }
     
       

    }
}
