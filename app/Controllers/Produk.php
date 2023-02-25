<?php namespace App\Controllers;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;
use App\Models\ModelUser;
use App\Models\ModelProfil;

class Produk extends BaseController
{

	public function __construct() {
		helper('form');
		$this->ModelKategori = new ModelKategori();
		$this->ModelProduk = new ModelProduk();
		$this->ModelSatuan = new ModelSatuan();
		$this->ModelProfil = new ModelProfil();
    $this->ModelUser = new ModelUser();
	}


	public function index()
	{
		$data = array(
			'menu' => 'master',
			'sub_menu' => 'produk',
			'title' => 'Halaman Produk',
			'judul' => 'Master Data',
			'produk' => $this->ModelProduk->all_data(),
			'kategori' => $this->ModelKategori->all_data(),
			'satuan' => $this->ModelSatuan->all_data(),
			'profil' => $this->ModelUser->all_data(),
			'sub_judul' => 'Halaman Produk',
			'isi' => 'v_produk'
		);
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		if ($this->validate([
			'kode_produk' => [
				'label' => 'Kode Produk / Barcode',
				'rules' => 'is_unique[tbl_produk.kode_produk]',
				'errors' => [
					'is_unique' => '{field} Sudah Ada, Masukkan Kode Lain',
				]
			],
			'id_satuan' => [
				'label' => 'Satuan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Belum Dipilih',
				]
			],
			'id_kategori' => [
				'label' => 'Kategori',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Belum Dipilih',
				]
			],
		])) {
			$hargaBeli = str_replace(",", "", $this->request->getPost('harga_beli'));
			$hargaJual = str_replace(",", "", $this->request->getPost('harga_jual'));
			$data = array(
				'kode_produk' => $this->request->getPost('kode_produk'),
				'nama_produk' => $this->request->getPost('nama_produk'),
				'id_kategori' => $this->request->getPost('id_kategori'),
				'id_satuan' => $this->request->getPost('id_satuan'),
				'harga_beli' => $hargaBeli,
				'harga_jual' => $hargaJual,
				'stok' => $this->request->getPost('stok'),
			);
			$this->ModelProduk->add($data);
			session()->setFlashdata('pesanSukses','Data Berhasil Ditambahkan');
			return redirect()->to(base_url('produk'));

		}else {
			session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
			return redirect()->to(base_url('produk'))->withInput('validation',\Config\Services::validation());
		}
	}

	public function update($id_produk)
	{
		if ($this->validate([
			'id_satuan' => [
				'label' => 'Satuan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Belum Dipilih',
				]
			],
			'id_kategori' => [
				'label' => 'Kategori',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Belum Dipilih',
				]
			],
		])) {
			$hargaBeli = str_replace(",", "", $this->request->getPost('harga_beli'));
			$hargaJual = str_replace(",", "", $this->request->getPost('harga_jual'));
			$data = array(
				'id_produk' => $id_produk,
				'nama_produk' => $this->request->getPost('nama_produk'),
				'id_kategori' => $this->request->getPost('id_kategori'),
				'id_satuan' => $this->request->getPost('id_satuan'),
				'harga_beli' => $hargaBeli,
				'harga_jual' => $hargaJual,
				'stok' => $this->request->getPost('stok'),
			);
			$this->ModelProduk->update_data($data);
			session()->setFlashdata('pesanSukses','Data Berhasil Diupdate');
			return redirect()->to(base_url('produk'));
		}else {
			session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
			return redirect()->to(base_url('produk'))->withInput('validation',\Config\Services::validation());
		}
	}

	public function delete($id_produk)
	{
		$data = array(
			'id_produk' => $id_produk,
		);
		$this->ModelProduk->delete_data($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Dihapus');
		return redirect()->to(base_url('produk'));
	}

	//--------------------------------------------------------------------

}
