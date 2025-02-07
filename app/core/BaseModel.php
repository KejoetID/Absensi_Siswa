<?php
class BaseModel
{
    // inisialisasi properti
    protected $db;
    protected $table;
    // konstruktor
    public function __construct()
    {
        // pembuatan objek dari kelas Database
        $this->db = new Database;
    }
    // metode baca semua data dari tabel
    public function getAll()
    {
        $this->db->query(
            'SELECT * FROM ' . $this->table
        );
        return $this->db->multiple();
    }
    // metode baca data berdasarkan id
    public function find($id)
    {
        $this->db->query(
            'SELECT * FROM ' . $this->table . ' WHERE id=:id'
        );
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    //metode baca data berdasarkan kolom tertentu
    public function where($column, $value){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE ' . $column . '=:value');
        $this->db->bind('value', $value);
        return $this->db->multiple();
    }
    // metode hapus data berdasarkan id
    public function destroy($id)
    {
        $this->db->query(
            'DELETE FROM ' . $this->table . ' WHERE id=:id'
        );
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function store($data){
        $key = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(', ', $key) . ")
            VALUES (:" . implode(", :", $key) . ")";
        $this->db->query($query);
        foreach ($data as $key => $value){
            $this->db->bind($key, $value);
        }
        $this->db->execute();
        return $this->db->rowCount();
    }

}