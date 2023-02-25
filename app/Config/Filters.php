<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'filteradmin' => \App\Filters\FilterAdmin::class,
		'filterkasir' => \App\Filters\FilterKasir::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'filteradmin' => ['except' => [
				'auth', 'auth/*'
				]],
				'filterkasir' => ['except' => [
					'auth', 'auth/*',
					]],
			// 'csrf',
		],
		'after'  => [
			'filteradmin' => ['except' => [
				'dashboard', 'dashboard*',
				'kategori', 'kategori/*',
				'laporan', 'laporan/*',
				'user', 'user/*',
				'penjualan', 'penjualan/*',
				'produk', 'produk/*',
				'satuan', 'satuan/*',
				'setting', 'setting/*',
				'laporanharian', 'laporanharian/*',
				'laporanbulanan', 'laporanbulanan/*',
				'laporantahunan', 'laporantahunan/*',
				'settingtoko', 'settingtoko/*',
				'profil', 'profil/*',
				]],
				'filterkasir' => ['except' => [
					'penjualan', 'penjualan*',
					]],
			'toolbar',
			'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
