<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Seed extends Seeder
{
    public function run()
    {
        $this->call(Admin::class);
        $this->call(Jabatan::class);
        $this->call(Anggota::class);
        $this->call(Tugas::class);
    }
}
