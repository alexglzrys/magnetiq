<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'copy' => [
                'type' => 'TEXT',
            ],
            'url_resource' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'published_at' => [
                'type' => 'DATETIME'
            ],
            'post_type_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'status_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'brand_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'category_id' => [
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
        $this->forge->addForeignKey('post_type_id', 'post_types', 'id', 'cascade', 'null');
        $this->forge->addForeignKey('status_id', 'status', 'id', 'cascade', 'null');
        $this->forge->addForeignKey('brand_id', 'brands', 'id', 'cascade', 'null');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'cascade', 'null');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'cascade', 'null');
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('posts');
        $this->db->enableForeignKeyChecks();
    }
}
