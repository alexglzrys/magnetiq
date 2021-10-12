<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'first_name' => 'Alejandro',
                'last_name' => 'González Reyes',
                'email' => 'alejandro@email.com',
                'password' => password_hash('123456789', PASSWORD_BCRYPT),
                'avatar' => 'https://randomuser.me/api/portraits/men/5.jpg',
                'role_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Ariana',
                'last_name' => 'Guerrero Morales',
                'email' => 'ariana@email.com',
                'password' => password_hash('123456789', PASSWORD_BCRYPT),
                'avatar' => 'https://randomuser.me/api/portraits/women/15.jpg',
                'role_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Sofía',
                'last_name' => 'Villela González',
                'email' => 'sofia@email.com',
                'password' => password_hash('123456789', PASSWORD_BCRYPT),
                'avatar' => 'https://randomuser.me/api/portraits/women/5.jpg',
                'role_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
