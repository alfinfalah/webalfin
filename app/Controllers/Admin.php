<?php

namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_fasilitas;
use CodeIgniter\Controller;

class Admin extends Controller
{
    protected $M_admin;
    public function __construct()
    {
        $this->M_admin = new M_admin();
    }
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('login');
        }
        $model = new M_admin;
        $data['title'] = 'Data Fasilitas';
        $data['getsegment'] = 'admin';
        $data['getFasilitas'] = $model->getFasilitas();
        return view('admin_view', $data);


    }
    public function tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('login');
        }
        $data['title'] = 'Tambah Data Fasilitas';
        $data['getsegment'] = 'admin';
        return view('tambah', $data);

    }
    public function add()
    {
        $model = new M_admin;
        $data = array(
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'koordinat' => $this->request->getPost('koordinat'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'gambar' => $this->request->getPost('gambar'),
            'video' => $this->request->getPost('video')
        );
        $model->savefasilitas($data);
        echo '<script>
alert("Sukses Tambah Data Fasilitas");
window.location="' . base_url('fasilitas') . '"
</script>';
    }
    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('login');
        }
        $model = new M_admin;
        $getFasilitas = $model->getFasilitas($id)->getRow();
        if (isset($getFasilitas)) {
            $data['fasilitas'] = $getFasilitas;
            $data['title'] = 'Edit ' . $getFasilitas->nama;

            echo view('header_view', $data);
            echo view('edit', $data);
            echo view('footer_view', $data);

        } else {

            echo '<script>
                    alert("ID ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('admin') . '"
                </script>';
        }
    }

    public function update()
    {
        $model = new M_admin;
        $id = $this->request->getPost('id');
        $data = array(
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'koordinat' => $this->request->getPost('koordinat'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'gambar' => $this->request->getPost('gambar'),
            'video' => $this->request->getPost('video')
        );
        $model->editFasilitas($data, $id);
        echo '<script>
                alert("Sukses Edit Data Fasilitas");
                window.location="' . base_url('admin') . '"
            </script>';
    }

    public function hapus($id)
    {
        $model = new M_admin;
        $getFasilitas = $model->getFasilitas($id)->getRow();
        if (isset($getFasilitas)) {
            $model->hapusFasilitas($id);
            echo '<script>
                    alert("Hapus Data Fasilitas Sukses");
                    window.location="' . base_url('admin') . '"
                </script>';

        } else {

            echo '<script>
                    alert("Hapus Gagal !, ID ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('admin') . '"
                </script>';
        }
    }

}