<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostTypeTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Imagen',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Vídeo',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Enlace',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        $this->db->table('post_types')->insertBatch($data);
    }
}
