<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Models\Konfigurasi_model;
use App\Models\Customer_model;
use App\Models\Galeri_model;

class Customers extends BaseController
{
	public $validation;
	public $m_customer;
	public $m_konfigurasi;
	public $m_galeri;
	public $konfigurasi;
	public $slider;
	public $mail;
	public $db1;

	public function __construct()
	{
		helper('form');
		
		$this->db1 				= \Config\Database::connect("csms"); 
        $this->validation 		= \Config\Services::validation();
		$this->m_customer 		= New Customer_model();
		$this->m_konfigurasi 	= New Konfigurasi_model();
		$this->m_galeri			= New Galeri_model();
		$this->konfigurasi 		= $this->m_konfigurasi->listing();
		$this->slider 			= $this->m_galeri->slider();
	}

	public function index(){
		checklogin();
		$data = [	
			'title'			=> 'Customers',
			'description'	=> $this->konfigurasi['namaweb'].', '.$this->konfigurasi['tentang'],
			'keywords'		=> $this->konfigurasi['namaweb'].', '.$this->konfigurasi['keywords'],
			'slider'		=> $this->slider,
			'konfigurasi'	=> $this->konfigurasi,
			'data'			=> $this->m_customer->listing(),
			'content'		=> 'admin/customer/index'
		];
		echo view('admin/layout/wrapper',$data);
	}

	public function register(){
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'title' 		=> 'required|min_length[2]',
				'nama' 		=> 'required|min_length[2]',
				'email' => [
		            'label'  => 'Email',
					'rules'  => 'required|valid_email|min_length[6]',
		            'errors' => [
		                'required'    => '{field} harus ada',
	    				'valid_email' => '{field} tidak sesuai format',
		            ]
	    		],
				'handphone' => [
		            'label'  => 'Handphone',
					'rules'  => 'required|min_length[10]',
		            'errors' => [
		                'required'    => '{field} harus ada',
		            ]
	    		],
	    		// 'produk' 	=> 'required|min_length[2]',
				// 'produk' => [
		        //     'label'  => 'Nama Produk',
		        //     'rules'  => 'required|min_length[2]',
		        //     'errors' => [
		        //         'required'    => '{field} harus ada'
		        //     ]
	    		// ],
	    		'alamat' 		=> 'required|min_length[2]',
	    		'province' 		=> 'required|min_length[1]',
	    		'district' 		=> 'required|min_length[1]',
	    		'subdistrict' 	=> 'required|min_length[1]',
	    		'village' 		=> 'required|min_length[1]',
	    		'postalcode' 	=> 'required|min_length[1]',
				'setuju' => [
		            'label'  => 'Checkbox',
		            'rules'  => 'required',
		            'errors' => [
		                'required'    => '{field} Syarat & Ketentuan harus dicentang'
		            ]
	    		]
        ])) {
			/**check customers */
			$hp = preg_replace('/^\+?62|\|1|\D/', '0', ($this->request->getPost('handphone')));
			$cus = $this->m_customer->cek($hp, $this->request->getPost('email'));
			$reg = 0;
			
        	if((int)$reg < 3){
				$this->db->transBegin();
				try {
					/**register customer */
					$data = [	
						'version'		=> 1,
						'active'		=> 1,
						'title' 		=> $this->request->getPost('title'),
						'title_name' 	=> $this->request->getPost('title_name'),
						'nama' 			=> $this->request->getPost('nama'),
						'email' 		=> $this->request->getPost('email'),
						'handphone' 	=> $hp,
						'telepon' 		=> $this->request->getPost('telepon'),
						'produk' 		=> $this->request->getPost('produk') != null ? $this->request->getPost('produk') : null,
						'alamat' 		=> $this->request->getPost('alamat'),
						'province_id' 		=> $this->request->getPost('province'),
						'districts_id' 		=> $this->request->getPost('district'),
						'subdistricts_id' 	=> $this->request->getPost('subdistrict'),
						'village_id' 		=> $this->request->getPost('village'),
						'postalcode_id' 	=> $this->request->getPost('postalcode'),
						'kritiksaran'	=> $this->request->getPost('kritiksaran') != null ? $this->request->getPost('kritiksaran') : null,
						'date_reg'		=> date('Y-m-d H:i:s')
					];

					$csms = [
						'customer_id' => $this->request->getPost('customer_id'),
						'title_code'  =>  $this->request->getPost('title'),
						'customer_name' => $this->request->getPost('nama'),
						'customer_phone_no' => $hp,
						'customer_email' => $this->request->getPost('email'),
						'customer_telephone' => $this->request->getPost('telepon'),
						'customer_address' => $this->request->getPost('alamat'),
						'customer_province' => $this->request->getPost('province_name'),
						'customer_city' => $this->request->getPost('district_name'),
						'customer_district' => $this->request->getPost('subdistrict_name'),
						'customer_village' => $this->request->getPost('village_name'),
						'customer_postal_id' => $this->request->getPost('postalcode'),
						'customer_postal_code' => $this->request->getPost('postalcode_name'),
						'customer_product' => $this->request->getPost('produk') != null ? $this->request->getPost('produk') : null,
						'customer_criticism_suggestions' => $this->request->getPost('kritiksaran') != null ? $this->request->getPost('kritiksaran') : null,
					];
					
					/**add customer*/
					if(empty($cus->id)){
						$this->m_customer->tambah($data);
						$id = $this->db->insertID();
					}
					/**update customer*/
					else{
						$data['id']	= $cus->id;
						$id = $cus->id;
						$this->m_customer->edit($data);
					}
					
					//$this->db->transRollback();
					$this->db->transCommit();
					$profile = $this->updateCsms($csms);
					$this->m_customer->edit(['id' => $id, 'registered' => 'Y']);
					$this->session->setFlashdata('sukses','Data telah ditambah');

					return redirect()->to(base_url('/'));
				} catch (\Exception $e) {
					$this->db->transRollback();
					die($e->getMessage());
				}
			}else{
				$this->session->setFlashdata('warning', 'Batas maksimal registrasi 3 kali!');
				return redirect()->to(base_url('/'));
			}
	    }else{
	    	$errors = $this->validation->getErrors();
	    	$this->session->setFlashdata('errors', $errors);
			return redirect()->to(base_url('/'));
		}
	}

	// update 
	public function updateCsms($par = [])
	{	
		$this->db1->transBegin();
        try {
			$query = "SET nocount on;
          		  DECLARE @msg_code  integer,
	              		  @msg_desc  varchar(MAX);

          		  EXEC [dbo].[SP_CRM_CUSTOMER_UPDATE_FREE_SVC] 
          		    @i_title          = '{$par['title_code']}',
                    @i_customer_name  = '{$par['customer_name']}',
                    @i_email          = '{$par['customer_email']}',
                    @i_telepon        = '{$par['customer_telephone']}',
                    @i_mobile_phone   = '{$par['customer_phone_no']}', 
                    @i_address        = '{$par['customer_address']}',
                    @i_postal_code    = {$par['customer_postal_code']},
                    @i_rovince        = '{$par['customer_province']}',
                    @i_city           = '{$par['customer_city']}',
                    @i_sub_district   = '{$par['customer_district']}',
                    @i_urban_village  = '{$par['customer_village']}',
                    @i_product        = '{$par['customer_product']}',
					@i_criticism_suggestions = '{$par['customer_criticism_suggestions']}',
          			@o_msg_code       = @msg_code output,
          			@o_msg_desc       = @msg_desc output;
                         
          		 SELECT @msg_code as msg_cd,
	              		@msg_desc as msg_desc
			";

			$result = $this->db1->query($query);
			if($result->getResult()[0]->msg_cd == 1){
				$this->db1->transCommit();
				return "success";
			}else{
				$this->db1->transRollback();
				return 'Update profile failed.';
			}
        } catch (Exception $e) {
			$this->db1->transRollback();
			return 'Update profile failed. Error: ' . $e->getMessage();
        }
	}

	public function delete($id)
	{	
		checklogin();
		$m_customer->delete($data);
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/customer'));
	}
}