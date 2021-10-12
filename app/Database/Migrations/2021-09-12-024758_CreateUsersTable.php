<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
                'unique' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
            ],
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => 80,
            ],
            'role_id' => [
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
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'cascade', 'null');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('users');
        $this->db->enableForeignKeyChecks();
    }
}
