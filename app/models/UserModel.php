<?php

class UserModel extends BaseModel{
    //ubah propert table yang ada pada class basemodel
    //dengan nama table yang digunakan saat model ini dipanggil
    protected $table = 'users';

    public function hash($teks)
    {
        return password_hash($teks, PASSWORD_BCRYPT);
    }
    public function storeUser($data)
    {
        // query SQL
$query = "INSERT INTO $this->table (
    username, password, role
) VALUES (
    :username, :password, :role
)";

// Hash password menggunakan password_hash
$hashedPassword = password_hash($data['inp_pass'], PASSWORD_BCRYPT);

// data binding mencegah SQL Injection dari form
$this->db->query($query);
$this->db->bind('username', $data['inp_user']);
$this->db->bind('password', $hashedPassword); // Menggunakan password yang sudah di-hash
$this->db->bind('role', $data['inp_role']);

// eksekusi query
$this->db->execute();

// kembalikan jumlah data yang tersimpan ke controller
return $this->db->rowCount();
    }
   
    public function updateUser($data, $id)
    {
       // query SQL
        $query = "UPDATE $this->table SET
        username=:username,
        password=:password,
        role=:role
        WHERE id=:id";

        // Hash password menggunakan password_hash
        $hashedPassword = password_hash($data['inp_pass'], PASSWORD_BCRYPT);

        // data binding untuk mencegah SQL Injection
        $this->db->query($query);
        $this->db->bind('username', $data['inp_user']);
        $this->db->bind('password', $hashedPassword);  // Menggunakan password yang sudah di-hash
        $this->db->bind('role', $data['inp_role']);
        $this->db->bind('id', $id);

        // eksekusi query
        $this->db->execute();

        // kembalikan jumlah data yang diubah ke controller
        return $this->db->rowCount();

    }


    }