<?php namespace App\Controllers;
use App\Models\ModelPenjualan;

class Penjualan extends BaseController
{

	public function __construct() {
		helper('form');
    $this->ModelPenjualan = new ModelPenjualan();
	}

	public function index()
	{

		$cart = \Config\Services::cart();
		
		$data = array(
			'title' => 'Penjualan',
			'no_faktur' => $this->ModelPenjualan->noFaktur(),
			'isi' => 'v_penjualan',
			'cart' => $cart->contents(),
			'grand_total' => $cart->total(),
			'produk' => $this->ModelPenjualan->all_data(),
		);
		return view('layout_penjualan/v_wrapper', $data);
	}

	public function CekProduk()
	{
		$kode_produk = $this->request->getPost('kode_produk');
		$produk = $this->ModelPenjualan->CekProduk($kode_produk);
		if ($produk == null) {
			$data = array(
				'nama_produk' => '',
				'nama_kategori' => '',
				'nama_satuan' => '',
				'harga_jual' => '',
				'harga_beli' => '',
			);
		}else {
			$data = array(
				'nama_produk' => $produk['nama_produk'],
				'nama_kategori' => $produk['nama_kategori'],
				'nama_satuan' => $produk['nama_satuan'],
				'harga_jual' => $produk['harga_jual'],
				'harga_beli' => $produk['harga_beli'],
			
			);
		}
		echo json_encode($data);
	}

	public function AddCart()
	{
		$cart = \Config\Services::cart();
		$cart->insert(array(
			'id'      =>  $this->request->getPost('kode_produk'),
			'qty'     =>  $this->request->getPost('qty'),
			'price'   => $this->request->getPost('harga_jual'),
			'name'    => $this->request->getPost('nama_produk'),
			'options' => array(
				'nama_kategori' => $this->request->getPost('nama_kategori'),
				'nama_satuan' => $this->request->getPost('nama_satuan'),
				'modal' => $this->request->getPost('harga_beli'),
			)
	 ));
	 return redirect()->to(base_url('penjualan'));
	}

	public function ViewCart()
	{
		$cart = \Config\Services::cart();
		$data = $cart->contents();

		echo dd($data);
	}

	public function ResetCart()
	{
		$cart = \Config\Services::cart();
		$cart->destroy();

		return redirect()->to(base_url('penjualan'));
	}

	public function RemoveItem($rowid)
	{
		$cart = \Config\Services::cart();
		$cart->remove($rowid);
		return redirect()->to(base_url('penjualan'));
	}

	public function SimpanTransaksi()
	{
		$cart = \Config\Services::cart();
		$produk = $cart->contents();
		$no_faktur = $this->ModelPenjualan->noFaktur();
		$dibayar = str_replace(",", "", $this->request->getPost('dibayar'));
		$kembalian = str_replace(",", "", $this->request->getPost('kembalian'));


		foreach ($produk as $key => $value) {
			$data = [
				'no_faktur' => $no_faktur,
				'kode_produk' => $value['id'],
				'harga' => $value['price'],
				'modal' => $value['options']['modal'],
				'qty' => $value['qty'],
				'total_harga' => $value['subtotal'],
				'untung' => ($value['price'] - $value['options']['modal']) *  $value['qty']
			];
			$this->ModelPenjualan->InsertRinciJual($data);
		}

		$data = [
			'no_faktur' => $no_faktur,
			'tgl_jual' => date('Y-m-d'),
			'jam' => date('H:i:s'),
			'grand_total' => $cart->total(),
			'dibayar' => $dibayar,
			'kembalian' => $kembalian,
			'id_user' => session()->get('id_user')
		];
		$this->ModelPenjualan->InsertJual($data);
		$cart->destroy();

		session()->setFlashdata('pesanSukses','Transaksi Berhasil Disimpan');
		return redirect()->to(base_url('penjualan'));


	}


}
