<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function saveregis($data)
    {
        $this->db->table('users')->insert($data);
    }

    public function login($email, $password)
    {
        return $this->db->table('users')->where([
            'email' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
