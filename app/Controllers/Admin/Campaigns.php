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

        $token_qiscus = $this->generateTokenQiscus();
        $send_whatsapp = $this->sendWhatsapp($data, $token_qiscus);
        // dd($send_whatsapp);

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

    function generateTokenQiscus()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://multichannel.qiscus.com/api/v1/auth",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array('email' => 'deacy.pandeirot@modena.com','password' => 'Modena2020'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $json = json_decode($response, true);
        $token = $json['data']['user']['authentication_token'];

        return $token;
    }

    // function sendWhatsapp ($data, $token)
    // {
    //     $name = $data['customer_name'];
    //     // $phone = $data['phone_number'];
    //     $phone = '08567779421'; //for testing only
    //     $form_url = base_url().'?code='.$data['generate_code'];

    //     $wa_params = "{$name}, mengikuti undian berhadiah dari Modena, dengan mengklik link di bawah ini, {$form_url}";

    //     $tmpParams    = explode(",", $wa_params);
    //     $countParams  = count($tmpParams);

    //     for($i=0;$i<$countParams;$i++)
    //     {
    //         $partParams[$i]= '"'.$tmpParams[$i].'"';
    //     }

    //     // dd($partParams);
    //     $wa_message_template = '['. implode(",",$partParams).']';

    //     $curl1 = curl_init();
    //     curl_setopt_array($curl1, array(
    //     CURLOPT_URL => "https://multichannel.qiscus.com/api/v2/admin/broadcast/client_broadcast",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_POSTFIELDS =>'{
    //             "channel_id": 914,
    //             "template_name": "free_campaign",
    //             "namespace": "823979cb_b96c_42d5_8af6_8fd017a1ab30",
    //             "language": "id",
    //             "variables": ['.implode(",",$partParams).'],
    //             "phone_numbers": ["'.$phone.'"]
    //     }',
    //     CURLOPT_HTTPHEADER => array(
    //         "Authorization: $token",
    //         "Content-Type: application/json",
    //         "Qiscus-App-Id: udi-jyifpszzafkpka0h5"
    //     ),
    //     ));

    //     $response = curl_exec($curl1);
    //     return $response;
    // }

    function sendWhatsapp ($data, $token)
    {
        $name = $data['customer_name'];
        $phone = $data['phone_number'];
        $form_url = base_url().'?code='.$data['generate_code'];
        $generate_code = $data['generate_code'];

        $wa_params = "{$name}, mengikuti undian berhadiah dari Modena, mengklik link di bawah ini, {$form_url}";

        $tmpParams    = explode(",", $wa_params);
        $countParams  = count($tmpParams);

        for($i=0;$i<$countParams;$i++)
        {
            $partParams[$i] = [
                'type'  => 'text',
                'text'  => $tmpParams[$i]
            ];
        }

        // $wa_message_template = '['. implode(",",$partParams).']';

        $curl1 = curl_init();
        curl_setopt_array($curl1, array(
        CURLOPT_URL => "https://multichannel.qiscus.com/whatsapp/v1/udi-jyifpszzafkpka0h5/914/messages",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>'{
            "to": "'.$phone.'",
            "type": "template",
            "template": {
                "namespace": "823979cb_b96c_42d5_8af6_8fd017a1ab30",
                "name": "free_campaign",
                "language": {
                    "policy": "deterministic",
                    "code": "id"
                },
                "components": [
                    {
                        "type": "header",
                        "parameters": [
                            {
                                "type": "image",
                                "image":{
                                    "link": "https://d3k81ch9hvuctc.cloudfront.net/company/YmSmGX/images/abedb597-b424-4d32-84ca-9edd3f07036c.jpeg"
                                }
                            }
                        ]
                    },
                    {
                        "type" : "body",
                        "parameters": '.json_encode($partParams).'
                    },
                    {
                        "type": "button",
                        "sub_type" : "url",
                        "index": "0",
                        "parameters": [
                            {
                                "type": "text",
                                "text": "?code='.$generate_code.'"
                            }
                        ]
                    }
                ]
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Qiscus-Secret-Key: b254e9258d1ea8cd8a348ede6a820ce0',
            'Qiscus-App-Id: udi-jyifpszzafkpka0h5'
        ),
        ));

        $response = curl_exec($curl1);
        return $response;
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