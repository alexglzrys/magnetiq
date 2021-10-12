<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Crayola Alternative',
                'avatar' => 'https://randomuser.me/api/portraits/women/60.jpg',
                'client_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Crayola Papelería',
                'avatar' => 'https://randomuser.me/api/portraits/women/61.jpg',
                'client_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Crayola Toys',
                'avatar' => 'https://randomuser.me/api/portraits/women/62.jpg',
                'client_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'El Rincón Panadero',
                'avatar' => 'https://randomuser.me/api/portraits/men/80.jpg',
                'client_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Hogar y Pan',
                'avatar' => 'https://randomuser.me/api/portraits/men/81.jpg',
                'client_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Tradipan',
                'avatar' => 'https://randomuser.me/api/portraits/men/82.jpg',
                'client_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Town Square Metepec',
                'avatar' => 'https://randomuser.me/api/portraits/women/90.jpg',
                'client_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Marina Puerto Cancún',
                'avatar' => 'https://randomuser.me/api/portraits/men/91.jpg',
                'client_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        $this->db->table('brands')->insertBatch($data);
    }
}
