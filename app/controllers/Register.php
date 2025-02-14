<?php 
//tahapan registrasi
//1.terima data dari form
//2.cek password dengan komfirmasi password
//3.hash password, jika sama
//4.susun semua data dalam bentuk array
//5.simpan data
class Register extends BaseController
{
    //untuk menampilkan konten awal
    public function index(){
        return parent::view('register/index');

    }

    //method untuk memproses register user
    public function proses(){
        $form_data = $_POST;
        $password = '';
    
        // Validasi Konfirmasi Password
        if ($form_data['password'] !== $form_data['konfirmasi_password']) {
            $_SESSION['flash'] = [
                'type' => 'negative',
                'title' => 'Registrasi Gagal',
                'message' => 'Konfirmasi Password tidak cocok'
            ];
            return parent::redirect('register', 'index');
        }
    
        // Cek apakah NISN sudah terdaftar
        $user = $this->model('UserModel')->where('nisn', $form_data['nisn']);
        if ($user) {
            $_SESSION['flash'] = [
                'type' => 'negative',
                'title' => 'Registrasi Gagal',
                'message' => 'NISN sudah terdaftar!'
            ];
            return parent::redirect('register', 'index');
        }
    
        // Hash password sebelum menyimpan ke database
        $password = password_hash($form_data['password'], PASSWORD_BCRYPT);
    
        // Simpan data ke database
        $data = [
            'nisn' => $form_data['nisn'],
            'nama' => $form_data['nama'],
            'password' => $password
        ];
        
        $result = $this->model('UserModel')->store($data);
    
        // Cek hasil penyimpanan
        if ($result) {
            $this->success('Registrasi Berhasil', 'Silahkan login dengan NISN Anda!');
            return parent::redirect('login', 'index');
        } else {
            $this->error('Registrasi', 'Terjadi kesalahan, silakan coba lagi.');
            return parent::redirect('register', 'index');
        }
    }
    
}