<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotificationTypesTable extends Migration
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
                'constraint' => 30,
                'unique' => true,
            ],
            'display_view' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'color' => [
                'type' => 'VARCHAR',
                'constraint' => 7,
            ],
            'background' => [
                'type' => 'VARCHAR',
                'constraint' => 7,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'unique' => true,
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
        $this->forge->createTable('notification_types');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('notification_types');
        $this->db->enableForeignKeyChecks();    
    }
}
