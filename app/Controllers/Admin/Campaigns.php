<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;

use App\Models\Konfigurasi_model;
use App\Models\Admin_form_model;
use App\Models\Galeri_model;

class Campaigns extends BaseController
{
    public $validation;
	public $m_admin_form;
	public $mail;
	public $db1;

	public function __construct()
	{
		helper('form');
		
		$this->db1 				= \Config\Database::connect("csms"); 
        $this->validation 		= \Config\Services::validation();
		$this->m_admin_form     = New Admin_form_model();
        $this->m_konfigurasi 	= New Konfigurasi_model();
		$this->m_galeri			= New Galeri_model();
		$this->konfigurasi 		= $this->m_konfigurasi->listing();
		$this->slider 			= $this->m_galeri->slider();
	}

    public function sales() 
    {
        checklogin();

		$data = [	
			'title'			=> 'Sales Campaigns',
			'description'	=> $this->konfigurasi['namaweb'].', '.$this->konfigurasi['tentang'],
			'keywords'		=> $this->konfigurasi['namaweb'].', '.$this->konfigurasi['keywords'],
			'slider'		=> $this->slider,
			'konfigurasi'	=> $this->konfigurasi,
			'data'			=> $this->m_admin_form->listing(),
			'content'		=> 'admin/campaigns/index'
		];

		echo view('admin/layout/wrapper',$data);
    }

    public function submit() 
    {
        checklogin();

        $session = \Config\Services::session();
        $admin_id = $session->get('id_user');
		$m_admin_form = new Admin_form_model();

        $this->validate([
            'customer_title_code'   => 'required',
            'customer_title' 	=> 'required',
            'customer_name' 	    => 'required',
            'customer_email' 	    => 'required',
            'phone_number' 	        => 'required',
        ]);

        $data = [	
            'customer_title_code'   => $this->request->getPost('customer_title_code'),
            'customer_title'        => $this->request->getPost('customer_title'),
            'customer_name'		    => $this->request->getPost('customer_name'),
            'customer_email'		=> $this->request->getPost('customer_email'),
            'phone_number'		    => $this->request->getPost('phone_number'),
            'admin_id'		        => $admin_id,
            'generate_code'		    => $this->generateRandomString(30),
            'created_at'	        => date('Y-m-d H:i:s'),
            'updated_at'	        => date('Y-m-d H:i:s')
        ];
        $m_admin_form->save($data);
        $this->session->setFlashdata('sukses','Data telah ditambah');
        return redirect()->to(base_url('admin/campaigns'));
    }

    public function delete($id)
	{	
		checklogin();
		$m_customer->delete($data);
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/customer'));
	}

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}