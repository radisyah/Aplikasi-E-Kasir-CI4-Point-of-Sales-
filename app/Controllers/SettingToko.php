<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelProfil;
use App\Models\ModelSetting;

class settingtoko extends BaseController
{

	public function __construct()
  {
    helper('form');
    $this->ModelProfil = new ModelProfil();
    $this->ModelUser = new ModelUser();
    $this->ModelSetting = new ModelSetting();
	}

	public function index()
	{
		$data = array(
			'menu' => 'setToko',
			'sub_menu' => '',
			'title' => 'Setting Toko',
			'profil' => $this->ModelUser->all_data(),
			'toko' => $this->ModelSetting->all_data(),
			'judul' => 'Setting Toko',
			'sub_judul' => '',
			'isi' => 'v_setToko'
		);
		return view('layout/v_wrapper', $data);

		
	}

	public function UpdateSetting()
	{
		$data = array(
			'id_toko' => '1',
			'nama_toko' => $this->request->getPost('nama_toko'),
			'no_telp' => $this->request->getPost('no_telp'),
			'alamat' => $this->request->getPost('alamat'),
			'slogan' => $this->request->getPost('slogan'),
			'deskripsi' => $this->request->getPost('deskripsi'),
		);
		$this->ModelSetting->update_data($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Diupdate');
		return redirect()->to(base_url('SettingToko'));
	}



	//--------------------------------------------------------------------

}
