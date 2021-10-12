<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostHasTagsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'post_id' => 1,
                'tag_id' => 2,
            ],
            [
                'post_id' => 2,
                'tag_id' => 1,
            ],
            [
                'post_id' => 3,
                'tag_id' => 3,
            ],
            [
                'post_id' => 3,
                'tag_id' => 4,
            ],
            [
                'post_id' => 4,
                'tag_id' => 6,
            ],
            [
                'post_id' => 5,
                'tag_id' => 5,
            ],
            [
                'post_id' => 5,
                'tag_id' => 6,
            ],
            [
                'post_id' => 6,
                'tag_id' => 13,
            ],
            [
                'post_id' => 7,
                'tag_id' => 7,
            ],
            [
                'post_id' => 8,
                'tag_id' => 8,
            ],
            [
                'post_id' => 9,
                'tag_id' => 10,
            ],
            [
                'post_id' => 10,
                'tag_id' => 8,
            ],
            [
                'post_id' => 11,
                'tag_id' => 12,
            ],
            [
                'post_id' => 12,
                'tag_id' => 11,
            ],
        ];
        $this->db->table('post_has_tags')->insertBatch($data);
    }
}
