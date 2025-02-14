<?php 

class BaseController {
    //method untuk menampilkan konten didalam layout
    public static function view($view, $data = []) {
        // Cek apakah view yang diminta adalah halaman login
        if ($view === 'login/index' || $view === 'siswa/hai') {
            include "../app/views/{$view}.php"; // Memuat hanya tampilan login
        } else {
            include "../app/views/layout/header.php"; // Memuat header untuk tampilan lainnya
            include "../app/views/{$view}.php";       // Memuat tampilan
            include "../app/views/layout/footer.php"; // Memuat footer untuk tampilan lainnya
        }
    }
    //method untuk beralih halaman otomatis setelah proses
    public static function redirect($controller, $method, $data = []){
        header('location: ' . BASE_URL . '/' . $controller . '/' . $method);
        exit;
    }

    public function model($model){
        require_once "../app/models/{$model}.php";
        return new $model;
    }
    public function success($title, $message = ''){
        return $_SESSION['flash'] = [
                    'type' => 'positive',
                    'title' => $title,
                    'message' => $message
        ];
    }
    public function error($title, $message = ''){
        return $_SESSION['flash'] = [
                    'type' => 'negative',
                    'title' => $title,
                    'message' => $message
        ];
    }
}