<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tugas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'anggota_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'jabatan_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'tugas' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('anggota_id', 'anggota', 'id');
        $this->forge->addForeignKey('jabatan_id', 'jabatan', 'id');
        $this->forge->createTable('tugas');
    }

    public function down()
    {
        $this->forge->dropTable('tugas');
    }
}
