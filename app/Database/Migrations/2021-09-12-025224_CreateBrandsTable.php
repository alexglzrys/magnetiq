<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBrandsTable extends Migration
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
                'constraint' => 40,
                'unique' => true,
            ],
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => 80,
            ],
            'client_id' => [
                'type' => 'INT',
                'unsigned' => true,
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
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'cascade', 'cascade');
        $this->forge->createTable('brands');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('brands');
        $this->db->enableForeignKeyChecks();
    }
}
