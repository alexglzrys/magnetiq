<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClientHasSocialNetworksTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'client_id' => 1,
                'social_network_id' => 1,
            ],
            [
                'client_id' => 1,
                'social_network_id' => 2,
            ],
            [
                'client_id' => 1,
                'social_network_id' => 3,
            ],
            [
                'client_id' => 2,
                'social_network_id' => 1,
            ],
            [
                'client_id' => 2,
                'social_network_id' => 2,
            ],
            [
                'client_id' => 3,
                'social_network_id' => 1,
            ],
            [
                'client_id' => 3,
                'social_network_id' => 2,
            ],
            [
                'client_id' => 3,
                'social_network_id' => 3,
            ],
            [
                'client_id' => 3,
                'social_network_id' => 4,
            ],
        ];
        $this->db->table('client_has_social_networks')->insertBatch($data);
    }
}
