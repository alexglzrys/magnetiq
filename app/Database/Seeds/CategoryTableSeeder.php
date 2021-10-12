<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Papelería',
                'slug' => 'papeleria',
                'color' => '#ffffff',
                'background' => '#0dc92c',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Juguetes',
                'slug' => 'juguetes',
                'color' => '#ffffff',
                'background' => '#c90d0d',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Mobiliario y Equipo de Oficina',
                'slug' => 'mobiliario-y-equipo-de-oficina',
                'color' => '#ffffff',
                'background' => '#0dc0c9',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Panadería',
                'slug' => 'panaderia',
                'color' => '#000000',
                'background' => '#ffe401',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Maquinaria',
                'slug' => 'maquinaria',
                'color' => '#ffffff',
                'background' => '#ff0196',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Centros Comerciales',
                'slug' => 'centros-comerciales',
                'color' => '#ffffff',
                'background' => '#ff8501',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        $this->db->table('categories')->insertBatch($data);
    }
}
