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
			],
			'sampul' => [
				'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran file terlalu besar, max 1mb',
					'is_image' => 'Yang anda upload bukan gambar',
					'mime_in' => 'Extensi file tidak di dukung'
				]
			]
		])) {
			return redirect()->to('/Buku/tambah')->withInput();
		}

		// Kelola file sampul
		$fileSampul = $this->request->getFile('sampul');

		// Cek apakah ada file yang di upload
		if($fileSampul->getError() == 4) {
			$namaSampul = 'default.png';
		} else {
		// nama sampul random
		$namaSampul = $fileSampul->getRandomName();
		// Pindahkan dir file ke path
		$fileSampul->move('img', $namaSampul);
		// nama file sama dengan nama file yang di upload
		// $namaFile = $fileSampul->getName();
		}


		$slug = url_title($this->request->getVar('judul'), '-', true);
		$this->bukuModel->save([
			'judul' => $this->request->getVar('judul'),
			'slug' => $slug,
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'sampul' => $namaSampul
		]);

		session()->setFlashdata('pesan', 'Data buku berhasil di tambahkan');
		return redirect()->to('/buku');
	}

	public function hapus($id)
	{
		$this->bukuModel->delete($id);

		session()->setFlashdata('pesan', 'Data buku berhasil di hapus');
		return redirect()->to('/buku');
	}

	public function edit($slug)
	{
		$data = [
			'title' => 'Edit Data',
			'validation' => \Config\Services::validation(),
			'buku' => $this->bukuModel->getBuku($slug)
		];
		return view('buku/edit', $data);
	}

	public function update($id)
	{
		// Cek apakah nama sama dengan yang di database untuk pengecekan
		$bukuLama = $this->bukuModel->getBuku($this->request->getVar('slug'));
		if($bukuLama['judul'] == $this->request->getVar('judul')) {
			$rules = 'required';
		} else {
			$rules = 'required|is_unique[buku.judul]';
		}

		// Validasi
		if (!$this->validate([
			'judul' => [
				'rules' => $rules,
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
			'id' => $this->request->getVar('id'),
			'judul' => $this->request->getVar('judul'),
			'slug' => $slug,
			'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'sampul' => $this->request->getVar('sampul')
		]);

		session()->setFlashdata('pesan', 'Data buku ' . $this->request->getVar('judul') . ' berhasil di ubah');

		return redirect()->to('/buku');
	}
}