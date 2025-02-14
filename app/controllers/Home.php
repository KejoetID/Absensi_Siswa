<?php 

class Home extends BaseController
{
    public function index(){
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
        return parent::view('home/index', [
            'siswa' => $siswa,
            'absensi' => $absensi
        ]);
    }
}
