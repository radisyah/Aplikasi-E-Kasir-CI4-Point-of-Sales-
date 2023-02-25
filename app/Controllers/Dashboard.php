<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelProfil;
use App\Models\ModelDashboard;

class Dashboard extends BaseController
{

	public function __construct()
  {
    helper('form');
    $this->ModelProfil = new ModelProfil();
    $this->ModelUser = new ModelUser();
    $this->ModelDashboard = new ModelDashboard();
	}

	public function index()
	{
		$data = array(
			'menu' => 'dashboard',
			'sub_menu' => '',
			'title' => 'Dashboard',
			'sub_title' => 'Halaman Admin',
			'profil' => $this->ModelUser->all_data(),
			'p_hari_ini' => $this->ModelDashboard->PendapatanHariIni(),
			'p_bulan_ini' => $this->ModelDashboard->PendapatanBulanIni(),
			'p_tahun_ini' => $this->ModelDashboard->PendapatanTahunIni(),
			'j_produk' => $this->ModelDashboard->JumlahProduk(),
			'j_kategori' => $this->ModelDashboard->JumlahKategori(),
			'j_satuan' => $this->ModelDashboard->JumlahSatuan(),
			'j_user' => $this->ModelDashboard->JumlahUser(),
			'grafik' => $this->ModelDashboard->Grafik(),
			'judul' => 'Master Data',
			'sub_judul' => '',
			'isi' => 'v_Home'
		);
		return view('layout/v_wrapper', $data);

		
	}

	public function Cek()
	{
		echo dd($this->ModelDashboard->PendapatanBulanIni());
	}





	//--------------------------------------------------------------------

}
