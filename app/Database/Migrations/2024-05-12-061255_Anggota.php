<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anggota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_anggota' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ttl_anggota' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'alamat_anggota' => [
                'type' => 'TEXT',
            ],
            'status_anggota' => [
                'type' => 'TINYINT',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('anggota');
    }

    public function down()
    {
        $this->forge->dropTable('anggota');
    }
}
