<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostHasTagsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'post_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'tag_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addForeignKey('post_id', 'posts', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('tag_id', 'tags', 'id', 'cascade', 'cascade');
        $this->forge->createTable('post_has_tags');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('post_has_tags');
        $this->db->enableForeignKeyChecks();
    }
}
