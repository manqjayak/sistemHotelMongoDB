<?php


class Kamar_model
{

    private $collection;
    private $db;

    public function __construct()
    {
        $conn = new MongoDB\Client;
        $this->db = $conn->hotel;
        $this->collection = $this->db->kamar;
    }

    public function selectAll()
    {
        return $this->collection->find();
    }
    public function tambahKamar($data)
    {
        $data = $this->collection->insertOne(['no_kamar'=>$data['nokamar'],'jenis_kamar'=>$data['jeniskamar'],'harga'=>$data['harga'],'status'=>'kosong']);
        return $data->getInsertedCount();
    }

    public function ubahKamar($data)
    {
        $data = $this->collection->updateOne(
            ['no_kamar'=>$data['nokamar']],
            ['$set'=>
                ['no_kamar'=>$data['nokamar'],
                'jeniskamar'=>$data['jeniskamar'],
                'harga'=>$data['harga']
                ]
            ]
        );
        return $data->getMatchedCount();
    }

    //dibutuhkan pada transaksi untuk mengecek ketersediaan kamar
        public function statusKamar()
        {
        
            $isiKamar = $this->collection->find(['status'=>'kosong'],['projection'=>['no_kamar'=>1]]);
        
            return $isiKamar;
        }
        public function getHarga($data)
        {
            return $this->collection->findOne(['no_kamar'=>$data]);
        }


    
}
