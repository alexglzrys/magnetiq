<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClientHasCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'client_id' => 1,
                'category_id' => 1,
            ],
            [
                'client_id' => 1,
                'category_id' => 2,
            ],
            [
                'client_id' => 1,
                'category_id' => 3,
            ],
            [
                'client_id' => 2,
                'category_id' => 4,
            ],
            [
                'client_id' => 2,
                'category_id' => 5,
            ],
            [
                'client_id' => 3,
                'category_id' => 6,
            ],
        ];
        $this->db->table('client_has_categories')->insertBatch($data);
    }
}
