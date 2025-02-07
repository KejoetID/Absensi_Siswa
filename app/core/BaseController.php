<?php 

class BaseController {
    //method untuk menampilkan konten didalam layout
        public static function view($view, $data = []) {
            include "../app/views/layout/header.php";
            include "../app/views/{$view}.php";
            include "../app/views/layout/footer.php";
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