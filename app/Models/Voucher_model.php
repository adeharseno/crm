<?php 
namespace App\Models;

use CodeIgniter\Model;

class Voucher_model extends Model
{

	protected $table = 'vouchers';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    public function listing()
    {
        $builder = $this->db->table('vouchers');
        $builder->select('*');
        $builder->orderBy('id','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function total()
    {
        $builder = $this->db->table('vouchers');
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function voucher()
    {
        return $this->db->table('vouchers')
            ->select("id, voucher, format(amount,0) as amount, date_format(start_periode, '%d-%m-%Y') as start, date_format(finish_periode, '%d-%m-%Y') as finish")
            ->where('status', 'N')
            ->limit(1)
            ->orderBy('id','ASC')
            ->get()
            ->getRow();
    }

    public function cek($id, $date){
        return $this->db->table('vouchers')->where('customer_id',$id)->where('register_date',$date)->get()->getNumRows();
    }

    public function tambah($data)
    {
        $builder = $this->db->table('vouchers');
        $builder->insert($data);
    }

    public function edit($data)
    {
        $builder = $this->db->table('vouchers');
        $builder->where('id',$data['id']);
        $builder->update($data);
    }
}