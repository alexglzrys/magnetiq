<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesTable extends Migration
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
                'unique' => true
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
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
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('categories');
        $this->db->enableForeignKeyChecks();
    }
}
