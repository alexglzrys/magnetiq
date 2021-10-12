<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Borrador',
                'color' => '#FFFFFF',
                'background' => '#3064B0',
                'icon' => 'fas fa-drafting-compass',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Revisión',
                'color' => '#FFFFFF',
                'background' => '#FF5733',
                'icon' => 'far fa-eye',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Aprobado',
                'color' => '#FFFFFF',
                'background' => '#30B070',
                'icon' => 'far fa-thumbs-up',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        $this->db->table('status')->insertBatch($data);
    }
}
