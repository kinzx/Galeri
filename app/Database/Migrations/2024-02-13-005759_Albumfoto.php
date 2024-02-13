<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Albumfoto extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'albumfotoid' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'albumid' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'iduser' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'idfoto' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('albumfotoid', true);
        $this->forge->addForeignKey('idfoto', 'foto', 'idfoto');
        $this->forge->addForeignKey('albumid', 'album', 'albumid');
        $this->forge->addForeignKey('iduser', 'user', 'iduser');

        $this->forge->createTable('albumfoto');
    }

    public function down()
    {
        $this->forge->dropTable('albumfoto');
    }
}
