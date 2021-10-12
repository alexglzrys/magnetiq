<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLogsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'excerpt' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'log_type_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'cascade', 'null');
        $this->forge->addForeignKey('log_type_id', 'log_types', 'id', 'cascade', 'null');
        $this->forge->createTable('logs');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('logs');
        $this->db->enableForeignKeyChecks();
    }
}
