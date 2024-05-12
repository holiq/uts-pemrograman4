<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Anggota extends Seeder
{
    public function run()
    {
        $this->db->table('anggota')->insertBatch([
            [
                'nama_anggota' => 'Dr. Wahyu Saputra',
                'ttl_anggota' => 'Jakarta, 12 Agustus 1988',
                'alamat_anggota' => 'Jl. Merdeka, Jakarta',
                'status_anggota' => 1,
            ],
            [
                'nama_anggota' => 'Prof. Albert Junaidi',
                'ttl_anggota' => 'Bantul, 4 September 1976',
                'alamat_anggota' => 'Jl. Soekarno, Jakarta',
                'status_anggota' => 1,
            ],
            [
                'nama_anggota' => 'Muhammad Agus',
                'ttl_anggota' => 'Makasar, 8 April 2000',
                'alamat_anggota' => 'Jl. Merdeka, Jakarta',
                'status_anggota' => 0,
            ],
            [
                'nama_anggota' => 'Agus Maulana, M.Kom',
                'ttl_anggota' => 'Solo, 19 Mei 1997',
                'alamat_anggota' => 'Jl. Pahlawan, Jakarta',
                'status_anggota' => 1,
            ],
            [
                'nama_anggota' => 'Ahmad Johan',
                'ttl_anggota' => 'Pekalongan, 1 Januari 1992',
                'alamat_anggota' => 'Jl. Kartini, Jakarta',
                'status_anggota' => 1,
            ],
        ]);
    }
}
