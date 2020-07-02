<?php


class Karyawan_model
{

    private $collection;
    private $db;

    public function __construct()
    {
        $conn = new MongoDB\Client;
        $this->db=$conn->hotel;
        $this->collection = $this->db->karyawan;
    }

    public function selectAll()
    {
        // $dummy = $this->collection->insertMany([
        //     ['_id'=>'A0',"nama"=>"agus",'alamat'=>'jalan samping jalan','jk'=>'perempuan','no_hp'=>"08432354323"],
        //     ['_id'=>'A1',"nama"=>"adi",'alamat'=>'jalan samping agus','jk'=>'laki-laki','no_hp'=>"08432354324"],
        // ]);
        // echo $dummy->getInsertedCount();die;

        $data = $this->collection->find();
        return $data;
    }

    public function tambahKaryawan($data)
    {


        $data= $this->collection->insertOne([
            '_id' =>$data['idkaryawan'],
            'nama'=>$data['nama'],
            'alamat'=>$data['alamat'],
            'jk' => $data['jeniskelamin'],
            'no_hp'=> $data['notlp'],
        ]);
    
        return $data->getInsertedCount();
    }

    public function ubahKaryawan($data)
    { 
       
        $data = $this->collection->updateOne(
            ['_id'=>$data['id_karyawan']],
            ['$set'=>
                ['nama'=>$data['nama'],
                'jk'=>$data['jk'],
                'alamat'=>$data['alamat'],
                'no_hp'=>$data['no_hp'],
                ]
            ]
        );
        return $data->getMatchedCount();

    }
}
