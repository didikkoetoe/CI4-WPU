<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class Buku extends BaseController
{
	protected $bukuModel;

	public function __construct()
	{
		$this->bukuModel = new BukuModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Daftar Buku',
			'buku' => $this->bukuModel->getBuku()
		];

		return view('buku/index', $data);
	}

	public function detail($slug)
	{
		$data = [
			'title' => 'Detail',
			'buku' => $this->bukuModel->getBuku($slug)
		];

		return view('buku/detail', $data);
	}

	public function tambah()
	{
		session();
		$data = [
			'title' => 'Tambah Buku',
			'validation' => \Config\Services::validation()
		];

		return view('buku/tambah', $data);
	}

	public function save()
	{
		// Validasi
		if (!$this->validate([
			'judul' => [
				'rules' => 'required|is_unique[buku.judul]',
				'errors' => [
					'required' => '{field} buku harus di isi',
					'is_unique' => '{field} buku sudah ada.'
				]
			]
		])) {
			return redirect()->to('/Buku/tambah')->withInput();
		}
		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->bukuModel->save([
			'judul' => $this->request->getVar('judul'),
			'slug' => $slug,
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'sampul' => $this->request->getVar('sampul')
		]);

		session()->setFlashdata('pesan', 'Data buku berhasil di tambahkan');
		return redirect()->to('/buku');
	}
}