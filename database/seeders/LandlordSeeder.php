<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::create([
            'name' => 'Development (DEV)',
            'domain' => 'dev.bec.local',
            'database' => 'crm_client_dev'
        ]);

        Tenant::create([
            'name' => 'Testing (QA)',
            'domain' => 'test.bec.local',
            'database' => 'crm_client_test'
        ]);
    }
}
