<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insert a user with fixed ID = 1
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Default User',
            'email' => 'default@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
