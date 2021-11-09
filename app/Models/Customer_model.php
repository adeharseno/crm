<?php 
namespace App\Models;

use CodeIgniter\Model;

class Customer_model extends Model
{

	protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    public function listing()
    {
        $builder = $this->db->table('customers');
        $builder->select('customers.*, province.label as province, districts.type, districts.label as districts, subdistricts.label as subdistricts, village.label as village, postalcode.label as postalcode');
        $builder->join('province','province.id = customers.province_id','LEFT');
        $builder->join('districts','districts.id = customers.districts_id','LEFT');
        $builder->join('subdistricts','subdistricts.id = customers.subdistricts_id','LEFT');
        $builder->join('village','village.id = customers.village_id','LEFT');
        $builder->join('postalcode','postalcode.id = customers.postalcode_id','LEFT');
        $builder->orderBy('customers.id','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function total()
    {
        $builder = $this->db->table('customers');
        $query = $builder->get();
        return $query->getNumRows();
    }
    
    public function cek($telepon, $email){
        return $this->db->table('customers')->orLike('telepon',$telepon,'both')->orLike('email',$email,'both')->get()->getRow();
    }

    public function detail($id)
    {

    }

    public function tambah($data)
    {
        $builder = $this->db->table('customers');
        $builder->insert($data);
    }

    public function edit($data)
    {
        $builder = $this->db->table('customers');
        $builder->where('id',$data['id']);
        $builder->update($data);
    }

    public function giveawayExist($code)
    {
        $builder = $this->db->table('customers');
        $builder->where('giveaway_code',$code);
        $query = $builder->get();
        return $query->getResult();
    }
}