<?php 
namespace App\Models;

use CodeIgniter\Model;

class Ajax_model extends Model
{

    public function fetchAllProvince()
    {
        return $this->db->table('province')->select('*')->orderBy('label','ASC')->get()->getResult();
    }

    public function fetchAllDistrict($id)
    {
        return $this->db->table('districts')->select('*')->where('province_id', $id)->orderBy('label','ASC')->get()->getResult();
    }

    public function fetchAllSubDistrict($id)
    {
        return $this->db->table('subdistricts')->select('*')->where('districts_id', $id)->orderBy('label','ASC')->get()->getResult();
    }

    public function fetchAllVillage($id)
    {
        return $this->db->table('village')->select('*')->where('subdistricts_id', $id)->orderBy('label','ASC')->get()->getResult();
    }

    public function fetchAllPostalcode($id)
    {
        return $this->db->table('postalcode')->select('*')->where('village_id', $id)->orderBy('label','ASC')->get()->getResult();
    }
    
}