<?php


class Transaksi_model
{

    private $db;
    private $collection;
    public function __construct()
    {

       $conn = new MongoDB\Client;
       $this->db = $conn->hotel;

       $this->collection = $this->db->transaksi;
    }

    public function selectAll()
    {
        $data = $this->collection->find([],['projection'=>['id_karyawan'=>1,'tanggal_masuk'=>1,'tanggal_keluar'=>1,'lama_menginap'=>1,'harga'=>1]]);
        return $data;
    }
//pada transaksi
    public function tambahTransaksi($data)
    {
        $this->db->kamar->updateOne(['no_kamar'=>$data['no_kamar']] ,['$set'=>['status'=>'terisi']]);
        $data = $this->collection->insertOne([
            'id_karyawan'=>$data['id_karyawan'],
            'pengunjung'=>[
                'nama'=>$data['nama'],
                'no_hp'=>$data['no_hp'],
                'no_ktp'=>$data['no_ktp']
            ],
            'kamar'=> [
                'no_kamar'=>$data['no_kamar'],
                'jenis_kamar'=>$data['jenis_kamar'],
                'kunci' => 'belum',
                'harga'=>$data['harga_kamar']
            ],
            'tanggal_masuk'=>$data['tanggal_masuk'],
            'tanggal_keluar' =>$data['tanggal_keluar'],
            'lama_menginap'=>$data['lama_menginap'],
            'harga'=>$data['harga']
        ]);
      

        return $data->getInsertedCount();
    }
    //cari pada riwayat transaksi
    public function cariBerdasarkanKeyword($data)
    {
        $data = $this->collection->find(array('$or'=>
            array(
                array('tanggal_keluar'=>new MongoDB\BSON\Regex($data['keyword']) ),
                array('kamar.kunci'=>new MongoDB\BSON\Regex($data['keyword']))
                )
            )
            );
        return $data;
    }


    //ajax untuk melihat kamar di transakasi
    //untuk pengunjung
    
    public function getPengunjung($data){
        $data = $this->collection->findOne(['_id'=>new MongoDB\BSON\ObjectID($data['id'])],['projection'=>['pengunjung'=>1,]]);
        return $data;
    }

    //untuk kamar
    public function getKamar($data){
       
        $data=$this->collection->findOne(['_id'=>new MongoDB\BSON\ObjectID($data['id'])],['projection'=>['kamar'=>1]]);
        return $data;
    }
    public function editStatusKunci($data){
        $editTransaksi= $this->collection->updateOne(['_id'=>new MongoDB\BSON\ObjectID($data['id'])],['$set'=>['kamar.kunci'=>'sudah']]);
        $editKamar = $this->db->kamar->updateOne(['no_kamar'=>$data['no_kamar']],['$set'=>['status'=>'kosong']]);
        return $editKamar->getMatchedCount();
    }
    
}
