<?php

class Pengunjung_model
{


    private $db;
    private $collection;
    public function __construct()
    {
        $conn = new MongoDB\Client;
        $this->db= $conn->hotel;
        $this->collection = $this->db->pengunjung;
    }


    public function selectAll()
    {
        // $dummy = $this->collection->insertMany([
        //     ['nama'=>'wayan','alamat'=>'jalan satu','jk'=>'laki-laki','no_hp'=>'08123456789','no_ktp'=>'5875736475832948'],
        //     ['nama'=>'kadek','alamat'=>'jalan dua','jk'=>'perempuan','no_hp'=>'08123456790','no_ktp'=>'5875736475832876'],
        //     ['nama'=>'ketut','alamat'=>'jalan tiga','jk'=>'laki-laki','no_hp'=>'08123456709','no_ktp'=>'5875736475832654'],
        // ]);
        // echo $dummy->getInsertedCount();die;

       $data = $this->collection->find();
       return $data;
    }

    public function cariBerdasarkanKeyword($data)
    {
       //abaikan error dari itelephense
        $data = $this->collection->find(array('$or'=>array(
                array('no_ktp' => new MongoDB\BSON\Regex($data['keyword']) ),
                array('nama'=>new MongoDB\BSON\Regex($data['keyword']))
        )));
        return $data;
   
    }

    public function tambahPengunjung($data)
    {
       $data= $this->collection->insertOne([
            'nama'=>$data['nama'],
            'alamat'=>$data['alamat'],
            'jk' => $data['jeniskelamin'],
            'no_hp'=> $data['NoHP'],
            'no_ktp' => $data['noKTP']
        ]);

        return $data->getInsertedCount();

    }
//cek ktp menggunakan ajax pada transaksi

public function cekPengunjung($data)
{
    $data= $this->collection->findOne(['no_ktp'=>$data['noktp']]);
    return $data;

}

}
