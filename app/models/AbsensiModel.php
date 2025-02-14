<?php

class AbsensiModel extends BaseModel
{
    protected $table = 'absensi';

    // Ambil semua data absensi berdasarkan NISN
    public function getAbsensiByNISN($nisn)
    {
        $this->db->query("SELECT * FROM $this->table WHERE nisn = :nisn ");
        $this->db->bind(':nisn', $nisn);
        return $this->db->single(); // Ambil banyak data
    }
    
    public function getKehadiran($nisn, $status)
    {
        $query = "SELECT COUNT(*) as jumlah FROM `absensi` WHERE `nisn` = :nisn AND `keterangan` = :status";
        $this->db->query($query);
        $this->db->bind(':nisn', $nisn);    // Bind parameter NISN
        $this->db->bind(':status', $status); // Bind parameter keterangan
        $result = $this->db->single(); // Mengambil hasil query
    
        // Mengembalikan jumlah data berdasarkan keterangan
        return $result['jumlah'] ?? 0;
    }

    // Ambil data absensi berdasarkan NISN dan tanggal
    public function getAbsensiByDate($nisn, $tanggal)
    {
        $this->db->query("SELECT * FROM $this->table WHERE nisn = :nisn AND tanggal = :tanggal");
        $this->db->bind(':nisn', $nisn);
        $this->db->bind(':tanggal', $tanggal);
        return $this->db->multiple(); // Ambil banyak data
    }
}
