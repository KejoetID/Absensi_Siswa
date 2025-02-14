<?php

class UserModel extends BaseModel {
    // Sesuaikan dengan tabel yang benar
    protected $table = 'usersiswa';

    public function hash($teks) {
        return password_hash($teks, PASSWORD_BCRYPT);
    }

    public function storeUser($data) {
        // Query SQL untuk menambahkan user ke tabel usersiswa
        $query = "INSERT INTO $this->table (
            nisn, nama, password
        ) VALUES (
            :nisn, :nama, :password
        )";

        // Hash password
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        // Data binding untuk menghindari SQL Injection
        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('password', $hashedPassword);

        // Eksekusi query
        $this->db->execute();

        // Mengembalikan jumlah data yang tersimpan ke controller
        return $this->db->count();
    }

    public function updateUser($data, $id) {
        // Query SQL untuk memperbarui data user
        $query = "UPDATE $this->table SET
            nisn = :nisn,
            nama = :nama,
            password = :password
            WHERE id = :id";

        // Hash password
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        // Data binding
        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('password', $hashedPassword);
        $this->db->bind('id', $id);

        // Eksekusi query
        $this->db->execute();

        // Mengembalikan jumlah data yang diperbarui ke controller
        return $this->db->count();
    }
}
