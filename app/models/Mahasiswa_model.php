<?php

class Mahasiswa_model
{
    // private $dbh; //database handler
    // private $stmt; //statement
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // private $mhs = [
    //     [
    //         "nama" => "filipi ketaren",
    //         "nirm" => "2022020031",
    //         "kelas" => "4SIA1",
    //         "Jurusan" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "khairul",
    //         "nirm" => "2022020007",
    //         "kelas" => "4SIA1",
    //         "Jurusan" => "Sistem komputer"
    //     ],
    //     [
    //         "nama" => "krisman",
    //         "nirm" => "2022020037",
    //         "kelas" => "4SIA1",
    //         "Jurusan" => "Teknik Komputer"
    //     ],
    // ];

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultset();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data) 
    {
        $query = "INSERT INTO mahasiswa 
                    VALUES
                    (NULL, :nama, :nirm, :kelas, :Jurusan)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nirm', $data['nirm']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('Jurusan', $data['jurusan']);

        $this->db->execute();
        return $this->db->rowCount();

    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nirm = :nirm,
                    kelas = :kelas,
                    Jurusan = :Jurusan
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nirm', $data['nirm']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('Jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
        // return 0;
    }


    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id =:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultset();
    }



}
