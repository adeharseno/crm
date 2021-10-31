<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Voucher_model;

class Voucher extends BaseController
{
	public $validation;
	public $m_voucher;
	public $m_konfigurasi;
	public $konfigurasi;

	public function __construct()
	{
		helper('form');
        $this->validation 		= \Config\Services::validation();
		$this->m_voucher		= New Voucher_model();
		$this->m_konfigurasi 	= New Konfigurasi_model();
		$this->konfigurasi 		= $this->m_konfigurasi->listing();
	}

	public function index(){
		checklogin();
		$data = [	
			'title'			=> $this->konfigurasi['namaweb'].' | '.$this->konfigurasi['tagline'],
			'description'	=> $this->konfigurasi['namaweb'].', '.$this->konfigurasi['tentang'],
			'keywords'		=> $this->konfigurasi['namaweb'].', '.$this->konfigurasi['keywords'],
			'konfigurasi'	=> $this->konfigurasi,
			'data'			=> $this->m_voucher->listing(),
			'content'		=> 'admin/voucher/index'
		];
		echo view('admin/layout/wrapper',$data);
	}
}