<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'display_name' => 'Administrador',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'community',
                'display_name' => 'Commnunity Manager',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        $this->db->table('roles')->insertBatch($data);
    }
}
