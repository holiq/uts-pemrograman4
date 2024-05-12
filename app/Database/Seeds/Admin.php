<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $this->db->table('admins')->insertBatch([
            [
                'name' => 'Holiq Ibrahim',
                'username' => 'holiq',
                'password' => password_hash('11111111', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'John Doe',
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT)
            ]
        ]);
    }
}
