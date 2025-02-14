<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class Barcode extends BaseController
{
    public function index()
    {
        if (!isset($_SESSION['user']['nisn'])) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }

        $nisn = $_SESSION['user']['nisn'];

        // Ambil data siswa
        $siswaModel = $this->model('SiswaModel');
        $siswa = $siswaModel->getSiswaByNISN($nisn);

        // Tambahkan data tambahan
        $data = [
            'nisn' => $nisn,
            'nama' => $siswa['nama'],
            'kelas' => $siswa['kelas']
            // 'nomor_hp' => $siswa['nomor_hp'],
            // 'alamat' => $siswa['alamat']
        ];

        // Konversi data ke format JSON
        $dataString = json_encode($data);

        // Buat QR Code dari string JSON
        $qrCode = new QrCode($dataString);
        $writer = new PngWriter();
        $qrCodeImage = $writer->write($qrCode)->getString();

        // Encode ke Base64
        $qrCodeBase64 = base64_encode($qrCodeImage);

        // Kirim data ke view
        return parent::view('barcode/index', [
            'siswa' => $siswa,
            'barcode' => $qrCodeBase64
        ]);
    }

    public function download() 
    {
        // Cek apakah user sudah login
        if (!isset($_SESSION['user']['nisn'])) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }
    
        // Ambil data NISN dari session
        $nisn = $_SESSION['user']['nisn'];
    
        // Pastikan library QR Code sudah di-load
        $qrCode = new \Endroid\QrCode\QrCode($nisn);
    
        // Set header untuk mendownload file QR Code
        header('Content-Type: image/png');
        header('Content-Disposition: attachment; filename="qrcode_' . $nisn . '.png"');
    
        // Output QR Code ke browser
        echo $qrCode->writeString();
        exit;
    }
    


}