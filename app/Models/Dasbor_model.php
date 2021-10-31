<?php 
namespace App\Models;

use CodeIgniter\Model;

class Dasbor_model extends Model
{
    // user
    public function user()
    {
        $builder = $this->db->table('users');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // client
    public function customer()
    {
        $builder = $this->db->table('customers');
        $query = $builder->get();
        return $query->getNumRows();
    }
}