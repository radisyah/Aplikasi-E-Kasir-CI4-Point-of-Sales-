<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelProfil;


class User extends BaseController
{

	public function __construct() {
		helper('form');
		$this->ModelUser = new ModelUser();
		$this->ModelProfil = new ModelProfil();
	}

	public function index()
	{
		$data = array(
			'menu' => 'master',
			'sub_menu' => 'user',
			'title' => 'User',
			'judul' => 'Master Data',
			'sub_judul' => 'User',
			'user' => $this->ModelUser->all_data(),
			'profil' => $this->ModelUser->all_data(),
			'isi' => 'v_user'
		);
		return view('layout/v_wrapper', $data);		
	}

	public function add()
	{
		$data = array(
			'username' => $this->request->getPost('username'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'level' => $this->request->getPost('level'),
		);
		$this->ModelUser->add($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Ditambahkan');
		return redirect()->to(base_url('user'));
	}

	public function update($id_user)
	{
		$data = array(
			'id_user' => $id_user,
			'username' => $this->request->getPost('username'),
			'email' => $this->request->getPost('email'),
			'level' => $this->request->getPost('level'),
		);
		$this->ModelUser->update_data($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Diupdate');
		return redirect()->to(base_url('user'));
	}

	public function delete($id_user)
	{
		$data = array(
			'id_user' => $id_user,
		);
		$this->ModelUser->delete_data($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Dihapus');
		return redirect()->to(base_url('user'));
	}

	//--------------------------------------------------------------------

}
