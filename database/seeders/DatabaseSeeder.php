<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if($_SERVER['argv'][1] !== 'tenants:migrate') {
            $this->call(LandlordSeeder::class);
        } else {
            User::factory(10)->create();
        }
       
    }
}
