<?php 

class Login extends BaseController
{
    public function index(){
        // Menambahkan variabel untuk menandai halaman login
        $data['isLoginPage'] = true; 
        parent::view('login/index', $data);
    }
    
    public function proses() {
        session_start(); // Pastikan session dimulai
        
        // Validasi input
        if (!isset($_POST['nisn']) || !isset($_POST['password'])) {
            $_SESSION['flash'] = [
                'type' => 'negative',
                'title' => 'Login Gagal',
                'message' => 'Harap isi NISN dan Password'
            ];
            return parent::redirect('login', 'index');
        }

        $nisn = trim($_POST['nisn']);
        $password = $_POST['password'];

        $db = new Database();
        $db->query("SELECT * FROM usersiswa WHERE nisn = :nisn");
        $db->bind('nisn', $nisn);
        $user = $db->single();

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']); // Hapus password sebelum menyimpan
            $_SESSION['user'] = $user;

            return parent::redirect('home', 'index');
        } else {
            $_SESSION['flash'] = [
                'type' => 'negative',
                'title' => 'Login Gagal',
                'message' => 'NISN atau Password salah'
            ];
            return parent::redirect('login', 'index');
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        return parent::redirect('login', 'index');
    }
}