<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSocialNetworksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
                'unique' => true
            ],
            'color' => [
                'type' => 'VARCHAR',
                'constraint' => 7,
            ],
            'background' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('social_networks');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('social_networks');
        $this->db->enableForeignKeyChecks();
    }
}
