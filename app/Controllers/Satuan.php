<?php namespace App\Controllers;
use App\Models\ModelSatuan;
use App\Models\ModelUser;
use App\Models\ModelProfil;

class Satuan extends BaseController
{

	public function __construct() {
		$this->ModelSatuan = new ModelSatuan();
		$this->ModelProfil = new ModelProfil();
    $this->ModelUser = new ModelUser();
		helper('form');
	}

	public function index()
	{
		$data = array(
			'menu' => 'master',
			'sub_menu' => 'satuan',
			'title' => 'Halaman Satuan',
			'judul' => 'Master Data',
			'satuan' => $this->ModelSatuan->all_data(),
			'profil' => $this->ModelUser->all_data(),
			'sub_judul' => 'Halaman Satuan',
			'isi' => 'v_satuan'
		);
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = array(
			'nama_satuan' => $this->request->getPost('nama_satuan'),
		);
		$this->ModelSatuan->add($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Ditambahkan');
		return redirect()->to(base_url('satuan'));
	}

	public function update($id_satuan)
	{
		$data = array(
			'id_satuan' => $id_satuan,
			'nama_satuan' => $this->request->getPost('nama_satuan'),
		);
		$this->ModelSatuan->update_data($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Diupdate');
		return redirect()->to(base_url('satuan'));
	}

	public function delete($id_satuan)
	{
		$data = array(
			'id_satuan' => $id_satuan,
		);
		$this->ModelSatuan->delete_data($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Dihapus');
		return redirect()->to(base_url('satuan'));
	}

	//--------------------------------------------------------------------

}
