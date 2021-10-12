<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLogTypesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
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
        $this->forge->createTable('log_types');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('log_types');
        $this->db->enableForeignKeyChecks();  
    }
}
