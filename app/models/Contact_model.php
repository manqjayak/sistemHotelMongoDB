<?php


class Contact_model
{

    private $table = 'contact';
    private $db;

    public function __construct()
    {
        // menginstansiasi class Database yang nantinya semua metho bisa digunakan
        $this->db = new Database;
    }

    public function getAllContact()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }


    public function getContactbyID($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id =:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahContact($data)
    {

        $query = "INSERT INTO contact
                    VALUES
                    ('',:nick, :job, :level)";

        $this->db->query($query);
        // $data['nick'] diadapat dari input yang atributnya name yang memiliki values nick, jadi antara value ini dan atribut input harus sama
        $this->db->bind('nick', $data['nick']);
        $this->db->bind('job', $data['job']);
        $this->db->bind('level', $data['level']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusContact($id)
    {
        $query = "DELETE FROM contact WHERE id =:id";
        $this->db->query($query);

        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahContact($data)
    {

        $query = "UPDATE contact
                    SET
                    nick = :nick,
                    job= :job,
                    level= :level
                    WHERE id = :id";

        $this->db->query($query);
        // $data['nick'] diadapat dari input yang atributnya name yang memiliki values nick, jadi antara value ini dan atribut input harus sama
        $this->db->bind('nick', $data['nick']);
        $this->db->bind('job', $data['job']);
        $this->db->bind('level', $data['level']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariContact()
    {
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM contact WHERE nick LIKE :keyword";
        $this->db->query($query);

        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
