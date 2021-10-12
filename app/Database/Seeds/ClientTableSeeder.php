<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Crayola',
                'slug' => 'crayola',
                'email' => 'crayola@email.com',
                'password' => password_hash('123456789', PASSWORD_BCRYPT),
                'avatar' => 'https://randomuser.me/api/portraits/men/20.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Esaf',
                'slug' => 'esaf',
                'email' => 'esafp@email.com',
                'password' => password_hash('123456789', PASSWORD_BCRYPT),
                'avatar' => 'https://randomuser.me/api/portraits/women/33.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Thor Urbana',
                'slug' => 'thor-urbana',
                'email' => 'thorurbana@email.com',
                'password' => password_hash('123456789', PASSWORD_BCRYPT),
                'avatar' => 'https://randomuser.me/api/portraits/men/47.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        $this->db->table('clients')->insertBatch($data);
    }
}
