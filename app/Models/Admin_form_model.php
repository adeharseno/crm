<?php 
namespace App\Models;

use CodeIgniter\Model;

class Admin_form_model extends Model
{

	protected $table = 'admin_form';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_title_code', 'customer_title', 'customer_name', 'customer_email', 'phone_number', 'admin_id', 'generate_code', 'created_at', 'updated_at'];

    public function listing()
    {
        $builder = $this->db->table('admin_form');
        $builder->select('admin_form.*, users.nama as admin_name');
        $builder->join('users','users.id_user = admin_form.admin_id','LEFT');
        $builder->orderBy('id','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function detail($code)
    {
        $builder = $this->db->table('admin_form');
        $builder->where('generate_code', $code);

        return $builder->get()->getRowArray();
    }

    public function tambah($data)
    {
        $builder = $this->db->table('admin_form');
        $builder->insert($data);
    }

    public function edit($data)
    {
        $builder = $this->db->table('admin_form');
        $builder->where('id',$data['id']);
        $builder->update($data);
    }
}