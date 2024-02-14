<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Komentarfoto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'komentarid'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fotoid'           => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'deskripsi'        => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
            ],
            'tanggalunggahan'  => [
                'type' => 'DATE',
            ],
            'lokasifoto'       => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'userid'           => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('komentarid', true);
        // $this->forge->addForeignKey('fotoid', 'foto', 'idfoto');
        // $this->forge->addForeignKey('userid', 'user', 'iduser');

        $this->forge->createTable('komentarfoto');
    }

    public function down()
    {
        $this->forge->dropTable('komentarfoto');
    }
}