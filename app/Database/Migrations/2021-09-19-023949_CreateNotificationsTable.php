<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'notification_type_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'post_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'who_send' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'who_receives' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
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
        $this->forge->addForeignKey('notification_type_id', 'notification_types', 'id', 'cascade', 'null');
        $this->forge->addForeignKey('post_id', 'posts', 'id', 'cascade', 'null');
        $this->forge->createTable('notifications');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('notifications');
        $this->db->enableForeignKeyChecks();  
    }
}
