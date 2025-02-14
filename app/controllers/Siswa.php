<?php

class Siswa extends BaseController
{

    public function index()
    {
        // Cek apakah user sudah login
        if (!isset($_SESSION['user']['nisn'])) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }

        $nisn = $_SESSION['user']['nisn'];

        // Ambil data siswa dan absensi berdasarkan NISN
        $siswaModel = $this->model('SiswaModel');
        $siswa = $siswaModel->getSiswaByNISN($nisn);
        $absensi = $siswaModel->getAbsensiByNISN($nisn);

        // Kirim data ke view
        return parent::view('siswa/index', [
            'siswa' => $siswa,
            'absensi' => $absensi
        ]);
    }

    public function detail($nisn, $tanggal = null)
    {
        // Panggil model
        $siswaModel = $this->model('SiswaModel');
        $absensiModel = $this->model('AbsensiModel');

        // Ambil data siswa
        $data['user'] = $siswaModel->getSiswaByNISN($nisn);

        // Jika tanggal tidak dipilih, ambil semua absensi
        if ($tanggal === null) {
            $data['absensi'] = $absensiModel->getAbsensiByNISN($nisn);
        } else {
            // Ambil data absensi berdasarkan tanggal yang dipilih
            $data['absensi'] = $absensiModel->getAbsensiByDate($nisn, $tanggal);
        }

        // Tampilkan halaman detail
        return parent::view('siswa/detail', $data);

    }

}
