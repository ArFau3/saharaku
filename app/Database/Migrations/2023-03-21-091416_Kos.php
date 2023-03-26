<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'jenis_promosi' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'daftar_promosi' => [
                'type'       => 'DATETIME',
            ],
            'harga' => [
                'type'       => 'int',
                'constraint' => '50',
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '450',
                'null'       => true,
            ],
            'tipe' => [
                'type'       => 'CHAR',
                'constraint' => '10',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'kamar_mandi_dalam' => [
                'type'       => 'BOOLEAN',
            ],
            'ac' => [
                'type'       => 'BOOLEAN',
            ],
            'wifi' => [
                'type'       => 'BOOLEAN',
            ],
            'thumbnail' => [
                'type'       => 'varchar',
                'constraint' => '150',
            ],
            'foto1' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                null         => true,
            ],
            'foto2' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                null         => true,
            ],
            'foto3' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                null         => true,
            ],
            'foto4' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                null         => true,
            ],
            'foto5' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                null         => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kos');
    }

    public function down()
    {
        $this->forge->dropTable('kos');
    }
}
