<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Foto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idfoto'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
            ],
            'tanggalunggahan' => [
                'type' => 'DATE',
            ],
            'lokasifoto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'iduser' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addKey('idfoto', true); // Ganti 'fotoid' menjadi 'idfoto'
        $this->forge->addForeignKey('iduser', 'user', 'iduser');
        $this->forge->createTable('foto');
    }

    public function down()
    {
        $this->forge->dropTable('foto');
    }
}