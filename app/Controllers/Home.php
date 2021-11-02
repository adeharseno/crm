<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Galeri_model;
use App\Models\Admin_form_model;

class Home extends BaseController
{

	// Homepage
	public function index()
	{
		$code = isset($_GET['code']) ? $_GET['code'] : null;
		if (!$code) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

		$m_konfigurasi 	= new Konfigurasi_model();
		$m_galeri		= new Galeri_model();
		$m_form			= new Admin_form_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$slider 		= $m_galeri->slider();
		$detail 		= $m_form->detail($code);
		if (!$detail) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		
		$data = [	'title'			=> $konfigurasi['namaweb'].' | '.$konfigurasi['tagline'],
					'description'	=> $konfigurasi['namaweb'].', '.$konfigurasi['tentang'],
					'keywords'		=> $konfigurasi['namaweb'].', '.$konfigurasi['keywords'],
					'slider'		=> $slider,
					'konfigurasi'	=> $konfigurasi,
					'detail'		=> $detail,
					'code'			=> $code,
				];
		echo view('home/index',$data);
	}
}