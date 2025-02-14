<?php

class SiswaModel extends BaseModel
{
    protected $tableS = 'siswa';
    protected $tableA = 'absensi';

    // Ambil data siswa berdasarkan NISN
    public function getSiswaByNISN($nisn)
    {
        $query = "SELECT * FROM $this->tableS WHERE nisn = :nisn";
        $this->db->query($query);
        $this->db->bind(':nisn', $nisn);
        return $this->db->single();
    }



    // Ambil riwayat absensi berdasarkan NISN
    public function getAbsensiByNISN($nisn)
    {
        $query = "SELECT * 
                  FROM $this->tableA 
                  WHERE nisn = :nisn 
                  ORDER BY tanggal DESC";
        $this->db->query($query);
        $this->db->bind(':nisn', $nisn);
        return $this->db->multiple();
    }



}

