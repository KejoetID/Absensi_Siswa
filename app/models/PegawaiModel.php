<?php
class PegawaiModel extends BaseModel
{
    // inisialisasi properti
    protected $table = 'pegawai';
    // metode lain akan ditambah dibawah ini..
    public function storePegawai($data)
    {
        // query SQL
        $query = "INSERT INTO $this->table (
     nama, jenis_kelamin, tanggal_lahir, jabatan
    ) VALUES (
    :nama, :jenis_kelamin, :tanggal_lahir,  :jabatan
    )";
        // data binding mencegah SQL Injection dari form
        $this->db->query($query);
        $this->db->bind('nama', $data['inp_nama']);
        $this->db->bind('jenis_kelamin', $data['inp_jk']);
        $this->db->bind('tanggal_lahir', $data['inp_tanggal']);
        $this->db->bind('jabatan', $data['inp_jabat']);
        // eksekusi query
        $this->db->execute();
        // kembalikan jumlah data yang tersimpan ke controller
        return $this->db->rowCount();
    }
    // metode update produk
    public function updatePegawai($data, $id)
    {
        // query SQL
        $query = "UPDATE $this->table SET
                        nama=:nama,
                        jenis_kelamin=:jenis_kelamin,
                        tanggal_lahir=:tanggal_lahir,
                        jabatan=:jabatan
                        WHERE id=:id";
        // data binding untuk mencegah SQL Injection
        $this->db->query($query);
        $this->db->bind('nama', $data['inp_nama']);
        $this->db->bind('jenis_kelamin', $data['inp_jk']);
        $this->db->bind('tanggal_lahir', $data['inp_tanggal']);
        $this->db->bind('jabatan', $data['inp_jabat']);
        $this->db->bind('id', $id);
        // eksekusi query
        $this->db->execute();
        // kembalikan jumlah data yang diubah ke controller
        return $this->db->rowCount();
    }
}
