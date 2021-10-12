<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommunityHasClientsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'client_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'cascade', 'cascade');
        $this->forge->createTable('community_has_clients');

    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('community_has_clients');
        $this->db->enableForeignKeyChecks();
    }
}
