<?php 

class Login extends BaseController
{
    public function index(){
        parent::view('login/index');
    }
    public function proses(){
        
        $data = $_POST;

        $db = new Database();
        $db->query (
            "SELECT * FROM users WHERE username=:username"
        );
        $db->bind('username', $data['username']);
        $user = $db->single();
        
        if ($user && password_verify($data['password'], $user['password'])) {
            // Jika password valid, unset password sebelum menyimpan data user ke session
            unset($user['password']);
            $_SESSION['user'] = $user;
            return parent::redirect('home', 'index');
        } 
        else {
            // Jika username atau password salah, beri notifikasi error
            $_SESSION['flash'] = [
                'type' => 'negative',
                'title' => 'Login Gagal',
                'message' => 'Username atau Password Salah'
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