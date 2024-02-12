<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Album extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'albumid' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'namaalbum' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
            ],
            'tanggaldibuat' => [
                'type' => 'DATE',
            ],
            'iduser' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('albumid', true);
        $this->forge->addForeignKey('iduser', 'user', 'iduser'); // Merujuk ke kolom 'iduser' di tabel 'user'
        $this->forge->createTable('album');
    }

    public function down()
    {
        $this->forge->dropTable('album');
    }

}
