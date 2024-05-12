<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Tugas extends Seeder
{
    public function run()
    {
        $this->db->table('tugas')->insertBatch([
            [
                'anggota_id' => 2,
                'jabatan_id' => 1,
                'tugas' => json_encode(["Mengatur Dosen dan Staff", "Mengatur kampus"]),
            ],
            [
                'anggota_id' => 4,
                'jabatan_id' => 4,
                'tugas' => json_encode(["Mengatur kurikulum"]),
            ],
        ]);
    }
}
