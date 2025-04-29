<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Seeder class to seed the application's database.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(LocationSeeder::class);
    }
}
