<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('RoleTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('SocialNetworkTableSeeder');

        $this->call('ClientTableSeeder');
        $this->call('BrandTableSeeder');

        $this->call('CommunityHasClientsTableSeeder');
        $this->call('ClientHasSocialNetworksTableSeeder');

        $this->call('CategoryTableSeeder');
        $this->call('TagTableSeeder');

        $this->call('ClientHasCategoriesTableSeeder');
        
        $this->call('PostTypeTableSeeder');
        $this->call('StatusTableSeeder');
        $this->call('PostTableSeeder');

        $this->call('PostHasTagsTableSeeder');
        $this->call('PostHasSocialNetworksTableSeeder');

        $this->call('CommentTableSeeder');
    }
}
