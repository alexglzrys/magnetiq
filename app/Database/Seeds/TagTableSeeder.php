<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TagTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Lapiceros',
                'slug' => 'lapiceros',
                'color' => '#ffffff',
                'background' => '#dd2a7b',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Plumones y Marcadores',
                'slug' => 'plumones-y-marcadores',
                'color' => '#ffffff',
                'background' => '#dd2a1b',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Escritorios',
                'slug' => 'escritorios',
                'color' => '#ffffff',
                'background' => '#e0785a',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Pizarrones',
                'slug' => 'pizarrones',
                'color' => '#ffffff',
                'background' => '#2a7b00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Bebés',
                'slug' => 'bebes',
                'color' => '#ffffff',
                'background' => '#7bcccc',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Juegos de mesa',
                'slug' => 'juegos-de-mesa',
                'color' => '#ffffff',
                'background' => '#1bca99',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Harinas',
                'slug' => 'harinas',
                'color' => '#ffffff',
                'background' => '#ffff77',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Colorantes y Saborizantes',
                'slug' => 'colorantes-y-saborizantes',
                'color' => '#ffffff',
                'background' => '#aa1177',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Levaduras',
                'slug' => 'levaduras',
                'color' => '#ffffff',
                'background' => '#dd9f41',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Promociones',
                'slug' => 'promociones',
                'color' => '#ffffff',
                'background' => '#23aa7b',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Eventos',
                'slug' => 'eventos',
                'color' => '#ffffff',
                'background' => '#515bd4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Apertura de Tiendas',
                'slug' => 'apertura-de-tiendas',
                'color' => '#ffffff',
                'background' => '#2ab8dd',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Apps',
                'slug' => 'apps',
                'color' => '#ffffff',
                'background' => '#99dd2a',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        $this->db->table('tags')->insertBatch($data);
    }
}
