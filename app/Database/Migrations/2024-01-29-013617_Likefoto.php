<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Likefoto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'likeid'      => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'idfoto'       => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
            ],
            'iduser'       => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'tanggallike'  => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addKey('likeid', true);
        $this->forge->createTable('likefoto');
    }

    public function down()
    {
        $this->forge->dropTable('likefoto');
    }
}
