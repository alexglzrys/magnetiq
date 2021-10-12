<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostHasSocialNetworksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'post_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'social_network_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addForeignKey('post_id', 'posts', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('social_network_id', 'social_networks', 'id', 'cascade', 'cascade');
        $this->forge->createTable('post_has_social_networks');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('post_has_social_networks');
        $this->db->enableForeignKeyChecks();
    }
}
