<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
           'name' => 'Shashank Bhattarai',
           'email' => 'responsemail.shashank@gmail.com',
           'email_verified_at' => Carbon::now(),
           'password' => bcrypt('password')
        ]);
    }
}
