<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home'
		];

		return view('pages/index', $data);
	}

	public function about($nama = 'Didik Prabowo', $umur = 19)
	{
		$data = [
			'title' => 'About',
			'nama' => $nama,
			'umur' => $umur
		];

		return view('pages/about', $data);
	}

	public function alamat()
	{
		$data = [
			'title' => 'Alamat',
			'alamat' => [
				[
					'type' => 'Rumah',
					'alamat' => 'Jalan Abc, Nomor 123',
					'provinsi' => 'Jawa Timur'
				],
				[
					'type' => 'Kantor',
					'alamat' => 'Desa Abc, Kacamatan Bca',
					'provinsi' => 'DKI Jakarta'
				]
			]
		];

		return view('pages/alamat', $data);
	}
}