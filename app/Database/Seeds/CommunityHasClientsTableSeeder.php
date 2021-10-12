<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommunityHasClientsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 2,
                'client_id' => 1,
            ],
            [
                'user_id' => 3,
                'client_id' => 1,
            ],
            [
                'user_id' => 3,
                'client_id' => 2,
            ],
            [
                'user_id' => 2,
                'client_id' => 3,
            ],
        ];
        $this->db->table('community_has_clients')->insertBatch($data);
    }
}
