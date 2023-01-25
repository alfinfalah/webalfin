<?php

namespace App\Controllers;

use App\Models\M_batas;
use App\Models\M_jalan;
use App\Models\M_fasilitas;


class Home extends BaseController
{
	protected $M_batas;
	protected $M_jalan;
	protected $M_fasilitas;


	public function __construct()
	{
		$this->M_batas = new M_batas();
		$this->M_jalan = new M_jalan();
		$this->M_fasilitas = new M_fasilitas();

	}

	public function index()
	{
		if (!session()->get('logged_in')) {
			return redirect()->to('login');
		}
		$data = [
			'title' => 'Peta Kecamatan doro | Home',
			'site' => $this->site,
			'vb' => $this->vb,
			'neighborhood_associations' => $this->M_batas->findAll(),
			'roads' => $this->M_jalan->findAll(),
			'facilities' => $this->M_fasilitas->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];
		return view('index', $data);
	}

	public function rt()
	{
		if (!session()->get('logged_in')) {
			return redirect()->to('login');
		}
		$data = [
			'title' => 'Batas RT | Home',
			'site' => $this->site,
			'vb' => $this->vb,
			'neighborhood_associations' => $this->M_batas->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];
		return view('rt', $data);
	}

	public function jalan()
	{
		if (!session()->get('logged_in')) {
			return redirect()->to('login');
		}
		// dd($this->M_jalan->findAll());
		$data = [
			'title' => 'Jalan desa  | Home',
			'site' => $this->site,
			'vb' => $this->vb,
			'roads' => $this->M_jalan->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];
		return view('jalan', $data);
	}

	public function fasilitas()
	{
		if (!session()->get('logged_in')) {
			return redirect()->to('login');
		}
		$data = [
			'title' => 'Fasilitas umum desa | Home',
			'site' => $this->site,
			'vb' => $this->vb,
			'facilities' => $this->M_fasilitas->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];

		return view('fasilitas', $data);

	}

	public function tambah()
	{
		if (!session()->get('logged_in')) {
			return redirect()->to('login');
		}
		$data['title'] = 'Tambah Data Fasilitas';
		echo view('header_view', $data);
		echo view('tambah_view', $data);
		echo view('footer_view', $data);
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


	public function cari()
	{
		if (!session()->get('logged_in')) {
			return redirect()->to('login');
		}
		$keyword = $this->request->getVar('keyword');
		// dd($this->M_fasilitas->search($keyword)->findAll());	
		$data = [
			'title' => 'Peta Kecamatan doro| Home',
			'site' => $this->site,
			'keyword' => $keyword,
			'vb' => '',
			'neighborhood_associations' => $this->M_batas->search($keyword)->findAll(),
			'roads' => $this->M_jalan->search($keyword)->findAll(),
			'facilities' => $this->M_fasilitas->search($keyword)->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];
		return view('cari', $data);
	}


}