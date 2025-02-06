<?php
class Product extends BaseController
{
    // metode default
    public function index()
    {
        // pembacaan data dari tabel
        // $data['products'] = $this->model('ProductModel')->getAll();
        $products = $this->model('ProductModel')->getAll();
        return parent::view('product/index', ['products' => $products]);
    }
    // metode lain letakkan disini..
    public function create()
    {
        // $this->view('layout/header');
        $this->view('product/create');
        // $this->view('layout/footer');
    }
    // metode store
    public function store()
    {
        $simpan = $this->model('ProductModel')->storeProduct($_POST);
        if ($simpan) {
            $this->success('Sukses!', 'Data berhasil ditambahkan.');
        } else {
            $this->error('Gagal!', 'Data gagal ditambahkan.');
        }
        return parent::redirect('product', 'index');
    }
    // metode detail
    public function detail($id){
        
        // panggil data yang akan diubah
        $data['product'] = $this->model('ProductModel')->find($id);
        // $this->view('layout/header');
        // kirimkan data ke view
        $this->view('product/detail', $data);
        // $this->view('layout/footer');
    }

    // metode edit
    public function edit($id)
    {
        // panggil data yang akan diubah
        $data['product'] = $this->model('ProductModel')->find($id);
        // $this->view('layout/header');
        // kirimkan data ke view
        $this->view('product/edit', $data);
        // $this->view('layout/footer');
    }
    // metode update
    public function update($id)
    {
        $ubahProduct = $this->model('ProductModel')->updateProduct($_POST, $id);
        if ($ubahProduct) {
            $this->success('Sukses!', 'Data berhasil diubah.');
        } else {
            $this->error('Gagal!', 'Data gagal diubah.');
        }
        return parent::redirect('product', 'index');
    }
    public function destroy($id)
    {
        $delete = $this->model('ProductModel')->destroy($id);
        if ($delete) {
            $this->success('Sukses!', 'Data berhasil dihapus.');
        } else {
            $this->error('Gagal!', 'Data gagal dihapus.');
        }
        return parent::redirect('product', 'index');
    }
}
