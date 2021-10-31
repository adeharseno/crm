<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Voucher_model;
use App\Models\Customer_model;

class Testing extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		$model = new \App\Models\Pmodel();

        $data = [
            'users' => $model->paginate(2),
            'pager' => $model->pager,
        ];
        
        echo $pager->links();
        //echo view('admin/dasbor/testing', $data);
	}

    public function email(){
        $email_smtp = \Config\Services::email();

        $email_smtp->setFrom("support@modena.co.id", "Pak Buas");
        $email_smtp->setTo("budi.astanto@modena.com");
        $email_smtp->setSubject("Ini subjectnya");
        $email_smtp->setMessage("Ini isi/body email");
        $email_smtp->send(false);
        $email_smtp->printDebugger(['headers']);

    }

    public function kota(){
		$curl = \Config\Services::curlrequest();
		$posts_data = $curl->get("https://ecommerce.modena.co.id", ['query' => ['c' => 'propinsi']]);
		echo "<pre>";
        //echo $posts_data->getReason();
        //echo $posts_data->getStatusCode();
		//print_r($posts_data);

        //print_r(json_decode($posts_data->getBody()));
        //$arr = json_decode($posts_data->getBody());

        //print_r($arr[0]);
        foreach(json_decode($posts_data->getBody()) as $key => $data)
            echo $data->state_id.'-'.$data->state.'<br>';

    }

    public function cek(){
        $curl = \Config\Services::curlrequest();
        $posts_data = $curl->post("http://csms.modena.com/csmsapinew/CustomerCheck", [
            'headers' => [
                'modena_keys' => 'MI_API-1168673b9ef95600a2b47018670cd2db'
            ],
            'form_params' => [
                'phone_no' => '081270001344x', 
                'flag' => 'Address'
            ]
        ]);
		echo "<pre>";
        //echo $posts_data->getReason();
        //echo $posts_data->getStatusCode();
		//print_r($posts_data->getBody());
        $json = json_decode($posts_data->getBody());
		if($json->status == 200){
			$data['status'] = $json->status;
            foreach($json->data as $i => $row)
                foreach($row as $key => $col)
					$data[$key] = $col;
        }else{
			$data = [
				'status' 	=>  $json->status,
				'msg_desc' 	=>  $json->msg_desc,
			];
        }
        
        echo json_encode($data);

    }

    public function cekitem(){
        $curl = \Config\Services::curlrequest();
        $posts_data = $curl->post("http://csms.modena.com/csmsapinew/ListItems", [
            'headers' => [
                'modena_keys' => 'MI_API-1168673b9ef95600a2b47018670cd2db'
            ],
            'form_params' => [
                'param' => 'PRIVE', 
                'flag' => 'comment1'
            ]
        ]);
		echo "<pre>";
        //echo $posts_data->getReason();
        //echo $posts_data->getStatusCode();
        $rs= json_decode($posts_data->getBody());
		//print_r($data->data);
        foreach($rs->data as $key => $row)
            echo $row->itemno.'-'.$row->fmtitemno.'-'.$row->itemdesc.'<br>';

    }


    public function coupon(){
        $model = new Voucher_model();
        dd($model->voucher());

        //$rs = $model->voucher();
        //$row = $rs[0];
        //echo $row->amount .'-'. $row->voucher .'-'. $row->start_periode .'-'. $row->finish_periode;

    }

    public function cekcustomer(){
        $model = new Customer_model();
        dd($model->cek('081270001343','budi.astanto@modena.com'));

        //$rs = $model->voucher();
        //$row = $rs[0];
        //echo $row->amount .'-'. $row->voucher .'-'. $row->start_periode .'-'. $row->finish_periode;

    }

    public function insert(){
       /* $curl = \Config\Services::curlrequest();
        $posts_data = $curl->post("http://csms.modena.com/csmsapinew/ListItems", [
            'headers' => [
                'modena_keys' => 'MI_API-1168673b9ef95600a2b47018670cd2db'
            ],
            'form_params' => [
                'param' => 'PRIVE', 
                'flag' => 'comment1'
            ]
        ]);
		echo "<pre>";
        //echo $posts_data->getReason();
        //echo $posts_data->getStatusCode();
        $rs= json_decode($posts_data->getBody());
		//print_r($data->data);
        foreach($rs->data as $key => $row)
            echo $row->itemno.'-'.$row->fmtitemno.'-'.$row->itemdesc.'<br>';

            /*'customer_id' => '',
            'title_code' => '220',
            'customer_name' => 'Tito',
            'customer_phone_no' => '08122228272828',
            'customer_email' => 'mtitoagustian@gmail.com',
            'customer_address' => 'a',
            'customer_province' => 'a',
            'customer_city' => 'a',
            'customer_district' => 'a',
            'customer_village' => 'a',
            'customer_postal_code' => '17411',
            'flag' => 'Insert'*/
        $this->csms->transBegin();
        try {
            $par = [
                'customer_id' => '00C0-C0A801C0-5C65393F-0AA4-74AC0A3C',
                'title_code'  =>  '220',
                'customer_name' => 'BUDI ASTANTO',
                'customer_phone_no' => '081270001344',
                'customer_email' => 'budi.astanto@gmail.com',
                'nama_perusahaan' => 'MODENA',
                'telepon_perusahaan' => '021555666',
                'customer_address' => 'CLUSTER GRAND SUTERA F3/6, JL GRAND SUTERA RAYA',
                'customer_province' => 'BANTEN',
                'customer_city' => 'TANGERANG',
                'customer_district' => 'PASAR KEMIS',
                'customer_village' => 'GELAM JAYA',
                'customer_postal_id' => '541',
                'customer_postal_code' => '15560'
            ];

            $query = "
				SET nocount on;
				DECLARE @msg_code  integer,
						@msg_desc  varchar(100),
						@customer_id varchar(50),
						@address_id  varchar(50),
						@phone_id    varchar(50);

				EXEC [dbo].[CHATBOT_API_CSMS_INSERT_CUSTOMER_FULL]
					@i_customer_id      	= '{$par['customer_id']}',
					@i_titl_code        	= '{$par['title_code']}',
					@i_cust_name        	= '{$par['customer_name']}',
					@i_cust_phoneno     	= '{$par['customer_phone_no']}',
					@i_cust_email       	= '{$par['customer_email']}',
					@i_nama_perusahaan		= '{$par['nama_perusahaan']}',
					@i_telepon_perusahaan 	= '{$par['telepon_perusahaan']}',
					@i_cust_address     	= '{$par['customer_address']}',
					@i_cust_province    	= '{$par['customer_province']}',
					@i_cust_city        	= '{$par['customer_city']}',
					@i_cust_district    	= '{$par['customer_district']}',
					@i_cust_vilage      	= '{$par['customer_village']}',
                    @i_cust_postal_id       = '{$par['customer_postal_id']}',
					@i_cust_postal_code 	= '{$par['customer_postal_code']}',
					@o_customer_id      	= @customer_id OUTPUT,
					@o_address_id       	= @address_id OUTPUT, 
					@o_phone_id         	= @phone_id OUTPUT, 
					@o_msg_code         	= @msg_code OUTPUT,
					@o_msg_desc         	= @msg_desc OUTPUT;

				SELECT @msg_code as msg_cd,
						@msg_desc as msg_desc, 
						@customer_id as customer_id,
						@address_id as address_id,
						@phone_id as phone_id;
			";

			$result = $this->csms->query($query);
			$this->csms->transCommit();
            echo json_encode(array('status'=>'success'));
        } catch (Exception $e) {
            echo json_encode(array('status'=>$e->getMessage()));
            $this->csms->transRollback();
        }
    }

    public function wablast(){
        /*
        *{{1}}*
        Terima kasih, {{2}} ! 
        Selamat {{3}} mendapatkan {{4}} 
        Kode Voucher {{5}} 
        Berlaku sampai tanggal {{6}} 
        Berlaku untuk {{7}} _
        Syarat & Ketentuan Berlaku_ 
        Informasi lebih lanjut MODENA Nationwide call center 1500715

        Notes:
        1. MODENA x PRIVE
        2. terima kasih telah mempercayakan pilihan produk kepada Kami
        3. Nama Customer
        4. voucher MODENA sebesar 1.000.000
        5. GENERATE VOUCHER
        6. 31-12-2021
        7. berlaku di MEC,MHC jabodetabek min 10 mio/transaksi
        */
        $template = 'cr_voucherpromo';
        $penerima = '081270001344';
        $name = 'Budi Astanto';
        $voucher = 'XX123214HDMK';
        $param_list = "MODENA x PRIVE,telah mempercayakan pilihan produk kepada Kami,{$name},voucher MODENA sebesar 1.000.000,{$voucher},31-12-2021,di MEC dan MHC jabodetabek min 10 Mio/Transaksi.";
        $this->csms->transBegin();
        try {

            /*
                echo "<br>masuk : " . $template;
                echo "<br>masuk : " . $penerima;
                echo "<br>masuk : " . $param_list;
                exit();
            */

            $this->csms->query("
                exec [dbo].[SP_WA_HTTP_REQUEST] 
                @i_url='http://api.modena.co.id/broadcastwa/wapush/qisqus_wa_push.php', 
                @i_data='templatename={$template}&telepon={$penerima}&params={$param_list}';
            ");
            
            $this->csms->transCommit();
            echo json_encode(array('status'=>'success'));
        } catch (Exception $e) {
            echo json_encode(array('status'=>$e->getMessage()));
            $this->csms->transRollback();
        }
    }
}