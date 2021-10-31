<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ajax_model;

class AjaxController extends BaseController
{

	private $model;
	private $curl;
	private $url;
	
	public function __construct() 
	{
	  	$this->model = new Ajax_model();
		$this->curl = \Config\Services::curlrequest();
		$this->url = "https://ecommerce.modena.co.id";
	}

	public function fetchProvince(){
		$id = $this->request->getPost('par');
		$select = $this->request->getPost('key');
		//$posts_data = $this->curl->get($this->url, ['query' => ['c' => 'propinsi']]);
	    $token = csrf_hash();
        $data[''] = '';
		//foreach(json_decode($posts_data->getBody()) as $key => $row)
		//	$data[$row->state_id] = ucwords($row->state);
		foreach ($this->model->fetchAllProvince() as $key => $row)
        	$data[$row->id] = ucwords(strtolower($row->label));
        
        $html = is_array($data) ? set_option($data, $select, null) : "";
        echo json_encode(['html' => $html, 'token' => $token]);
	}

	public function fetchDistrict(){
		$id = $this->request->getPost('par');
		$select = $this->request->getPost('key');
		//$posts_data = $this->curl->get($this->url, ['query' => ['c' => 'kota', 'id' => $id, 'identifier' => 'propinsi']]);
	    $token = csrf_hash();
        $data[''] = '';
		//foreach(json_decode($posts_data->getBody()) as $key => $row)
		//	$data[$row->region_id] = ucwords($row->region);
		foreach ($this->model->fetchAllDistrict($this->request->getPost('par')) as $key => $row)
        	$data[$row->id] = ucwords(strtolower($row->type.' '.$row->label));
        
        $html = is_array($data) ? set_option($data, $select, null) : "";
        echo json_encode(['html' => $html, 'token' => $token]);
	}

	public function fetchSubDistrict(){
		$id = $this->request->getPost('par');
		$select = $this->request->getPost('key');
		//$posts_data = $this->curl->get($this->url, ['query' => ['c' => 'kecamatan', 'id' => $id]]);
	    $token = csrf_hash();
        $data[''] = '';
		//foreach(json_decode($posts_data->getBody()) as $key => $row)
		//	$data[$row->kecamatan_id] = ucwords(strtolower($row->kecamatan));
        foreach ($this->model->fetchAllSubDistrict($this->request->getPost('par')) as $key => $row)
        	$data[$row->id] = ucwords(strtolower($row->label));

        $html = is_array($data) ? set_option($data, $select, null) : "";
        echo json_encode(['html' => $html, 'token' => $token]);
	}

	public function fetchVillage(){
		$id = $this->request->getPost('par');
		$select = $this->request->getPost('key');
		//$posts_data = $this->curl->get($this->url, ['query' => ['c' => 'kelurahan', 'id' => $id]]);
	    $token = csrf_hash();
        $data[''] = '';
		//foreach(json_decode($posts_data->getBody()) as $key => $row)
		//	$data[$row->kelurahan_id] = ucwords(strtolower($row->kelurahan));
        foreach ($this->model->fetchAllVillage($this->request->getPost('par')) as $key => $row)
        	$data[$row->id] = ucwords(strtolower($row->label));

        $html = is_array($data) ? set_option($data, $select, null) : "";
        echo json_encode(['html' => $html, 'token' => $token]);
	}

	public function fetchPostalcode(){
		$id = $this->request->getPost('par');
		$select = $this->request->getPost('key');
		//$posts_data = $this->curl->get($this->url, ['query' => ['c' => 'kodepos', 'id' => $id]]);
	    $token = csrf_hash();
        $data[''] = '';
		//foreach(json_decode($posts_data->getBody()) as $key => $row)
		//	$data[$row->postal_code_id] = $row->postal_code;
        foreach ($this->model->fetchAllPostalcode($this->request->getPost('par')) as $key => $row)
        	$data[$row->id] = $row->label;
			
        $html = is_array($data) ? set_option($data, $select, null) : "";
        echo json_encode(['html' => $html, 'token' => $token]);
	}

	public function fetchProduct(){
	    $select = $this->request->getPost('par');
	    $par = $this->request->getPost('key');
		$posts_data = $this->curl->post("http://csms.modena.com/csmsapinew/CommonMaster", [
            'headers' => [
                'modena_keys' => 'MI_API-1168673b9ef95600a2b47018670cd2db'
            ],
            'form_params' => [
                'param' => $par,
                'flag' => 'customerproduct'
            ]
        ]);
		
		$json = json_decode($posts_data->getBody());
		if($json->status == 200){
            foreach($json->data as $i => $row){
				$data[$row->produk_id] = $row->produk_id . ' - ' . trim($row->item_deskripsi);
			}
        }
	    $token = csrf_hash();
		$html = is_array($data) ? set_option($data, $select, null) : "";
        echo json_encode(['html' => $html, 'token' => $token]);
	}

	public function fetchCustomerProfile(){
		$par = preg_replace('/^\+?62|\|1|\D/', '0', ($this->request->getPost('par')));
		$posts_data = $this->curl->post("http://csms.modena.com/csmsapinew/CustomerCheck", [
            'headers' => [
                'modena_keys' => 'MI_API-1168673b9ef95600a2b47018670cd2db'
            ],
            'form_params' => [
                'phone_no' => $par, 
                'flag' => 'Address'
            ]
        ]);
		
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
	    $token = csrf_hash();
        echo json_encode(['item' => $data, 'token' => $token]);
	}

}