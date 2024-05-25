<?php

namespace App\Models;

use CodeIgniter\Model;

class Akun_model extends Model
{
    protected $table = 'tb_user';

    public function get_akun()
    {
        $this->db = \Config\Database::connect();
        return $this->db->table('tb_user')->orderBy('nama', 'ASC')->get()->getResult();
    }
    public function add_akun(array $akun)
    {
        $this->db = \Config\Database::connect();
        $this->db->table('tb_user')->insert($akun);

        return $this->db->insertID();
    }
    public function delete_user($id)
    {
        $this->db = \Config\Database::connect();
        return $this->db->table('tb_user')->where('id_user', $id)->delete();
    }
}
