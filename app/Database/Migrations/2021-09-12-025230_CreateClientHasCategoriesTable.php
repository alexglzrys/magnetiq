<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientHasCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'client_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'cascade', 'cascade');
        $this->forge->createTable('client_has_categories');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('client_has_categories');
        $this->db->enableForeignKeyChecks();
    }
}
