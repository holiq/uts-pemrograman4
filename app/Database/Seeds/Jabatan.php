<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Jabatan extends Seeder
{
    public function run()
    {
        $this->db->table('jabatan')->insertBatch([
            [
                'nama_jabatan' => 'Rektor',
            ],
            [
                'nama_jabatan' => 'Wakil Rektor 1',
            ],
            [
                'nama_jabatan' => 'Wakil Rektor 2',
            ],
            [
                'nama_jabatan' => 'Dekan',
            ],
            [
                'nama_jabatan' => 'Kaprodi',
            ],
            [
                'nama_jabatan' => 'Dosen',
            ],
            [
                'nama_jabatan' => 'Staff Akademik',
            ],
        ]);
    }
}
