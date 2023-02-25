<?php namespace App\Controllers;
use App\Models\ModelAuth;

class Auth extends BaseController
{

	public function __construct()
  {
    helper('form');
    $this->ModelAuth = new ModelAuth();
	}

	public function index()
	{
		$data = array(
			'title' => 'Login',
			'isi' => 'v_login',
		);
		return view('layout_login/v_wrapper', $data);
	}

	public function cek_login()
  {
    if ($this->validate([
        'email'=>[
        'label' => 'E-Mail',
        'rules' => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong!!'
          ]
        ],
        'password'=>[
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
        'required' => '{field} Tidak Boleh Kosong!!'
          ]
        ],
    ])) {
        // jika tidak valids
      $email = $this->request->getPost('email');
      $password = $this->request->getPost('password');
      $cek = $this->ModelAuth->login($email);
      if ($cek) {
        if(password_verify($password, $cek['password'])){
          // Jika datanya ditemukan
          session()->set('log',true);
          session()->set('id_user',$cek['id_user']);
          session()->set('username',$cek['username']);
          session()->set('email',$cek['email']);
          session()->set('level',$cek['level']);
          // Logins
          return redirect()->to(base_url('admin'));
        }else{
          session()->setFlashdata('pesanGagal', 'Password Salah');
          return redirect()->to(base_url('auth'));
        }
      }else {
        // Jika datanya tidak cocok
        session()->setFlashdata('pesanGagal', 'Login Gagal');
        return redirect()->to(base_url('auth'));
      }
    }else {
       	session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
        return redirect()->to(base_url('auth'))->withInput('validation',\Config\Services::validation());
    }
  }

  public function logout(){
    session()->remove('log');
    session()->remove('username');
    session()->remove('email');
    session()->remove('level');
    session()->setFlashdata('pesanSukses', 'Logout Sukses');
    return redirect()->to(base_url('auth'));
  }


	

	//--------------------------------------------------------------------

}
