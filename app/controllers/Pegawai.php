<?php 

class Pegawai extends BaseController
{
    public function index(){
        $pegawai = $this->model('PegawaiModel')->getAll();
		return parent::view('pegawai/index', ['pegawai' => $pegawai]);
    }


    public function create()
    {
        // $this->view('layout/header');
        $this->view('pegawai/create');
        // $this->view('layout/footer');
    }
    // metode store
    public function store()
    {
        $simpan = $this->model('PegawaiModel')->storePegawai($_POST);
        if ($simpan) {
            $this->success('Sukses!', 'Data Berhasil Ditambahkan.');
        } else {
            $this->error('Gagal!', 'Data gagal Ditambahkan.');
        }
        return parent::redirect('pegawai', 'index');
    }
    // metode edit
    public function edit($id)
    {
        // panggil data yang akan diubah
        $data['pegawai'] = $this->model('PegawaiModel')->find($id);
        // $this->view('layout/header');
        // kirimkan data ke view
        $this->view('pegawai/edit', $data);
        // $this->view('layout/footer');
    }

    public function update($id)
    {
        $ubahPegawai = $this->model('PegawaiModel')->updatePegawai($_POST, $id);
        if ($ubahPegawai) {
            $this->success('Sukses!', 'Data Berhasil Diubah.');
        } else {
            $this->error('Gagal!', 'Data Gagal Diubah.');
        }
        return parent::redirect('pegawai', 'index');
    }

    public function destroy($id)
    {
        $delete = $this->model('PegawaiModel')->destroy($id);
        if ($delete) {
            $this->success('Sukses!', 'Data Berhasil Dihapus.');
        } else {
            $this->error('Gagal!', 'Data gagal Dihapus.');
        }
        return parent::redirect('pegawai', 'index');
    }
}
