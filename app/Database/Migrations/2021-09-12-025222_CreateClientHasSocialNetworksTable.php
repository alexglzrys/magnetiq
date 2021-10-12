<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientHasSocialNetworksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'client_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'social_network_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('social_network_id', 'social_networks', 'id', 'cascade', 'cascade');
        $this->forge->createTable('client_has_social_networks');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('client_has_social_networks');
        $this->db->enableForeignKeyChecks();
    }
}
