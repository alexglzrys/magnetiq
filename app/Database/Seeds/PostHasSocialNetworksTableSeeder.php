<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostHasSocialNetworksTableSeeder extends Seeder
{
    public function run()
    {
        // 6 Crayola (FB/TW/INS) 4 Esaf (FB/TW) 2 Thor (FB/TW/INS/PIN)
        // FB, TW, INS, PIN
        $data = [
            [
                'post_id' => 1,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 1,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 1,
                'social_network_id' => 3,
            ],
            [
                'post_id' => 2,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 2,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 2,
                'social_network_id' => 3,
            ],
            [
                'post_id' => 3,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 3,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 3,
                'social_network_id' => 3,
            ],
            [
                'post_id' => 4,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 4,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 5,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 5,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 6,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 6,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 7,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 7,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 8,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 8,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 9,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 9,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 10,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 10,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 11,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 11,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 11,
                'social_network_id' => 3,
            ],
            [
                'post_id' => 11,
                'social_network_id' => 4,
            ],
            [
                'post_id' => 12,
                'social_network_id' => 1,
            ],
            [
                'post_id' => 12,
                'social_network_id' => 2,
            ],
            [
                'post_id' => 12,
                'social_network_id' => 3,
            ],
            [
                'post_id' => 12,
                'social_network_id' => 4,
            ],
        ];
        $this->db->table('post_has_social_networks')->insertBatch($data);
    }
}
