<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SocialNetworkTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Facebook',
                'icon' => 'fab fa-facebook-square',
                'color' => '#FFFFFF',
                'background' => '#3b5998',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Twitter',
                'icon' => 'fab fa-twitter-square',
                'color' => '#FFFFFF',
                'background' => ' #00acee ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Instagram',
                'icon' => 'fab fa-instagram-square',
                'color' => '#FFFFFF',
                'background' =>'linear-gradient(90deg, #515BD4 0%, #8134AF 25%, #DD2A7B 50%, #FEDA77 75%, #F58529 100%)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Pinterest',
                'icon' => 'fab fa-pinterest-square',
                'color' => '#FFFFFF',
                'background' => ' #c8232c',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        $this->db->table('social_networks')->insertBatch($data);
    }
}
