<?php 

class About extends Controller {
    public function index($nama = 'filipi',$kelas='4sia1') {
        $data['nama']= $nama;
        $data['kelas']= $kelas;
        $data['judul'] = 'About';
        $this->views('templates/header');
        $this->views('About/index',$data);
        $this->views('templates/footer');
    }
    public function Page() {
        $data['judul'] = 'Pages';
        $this->views('templates/header', $data);
        $this->views('About/Page');
        $this->views('templates/footer');
    }
}