<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Seeder class to populate the 'locations' table with initial data.
 */
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            [
                'name' => 'Cartagena',
                'image' => 'https://via.placeholder.com/150?text=Cartagena',
                'creation_date' => Carbon::create('2023', '01', '10'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Medellín',
                'image' => 'https://via.placeholder.com/150?text=Medellin',
                'creation_date' => Carbon::create('2023', '02', '15'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bogotá',
                'image' => 'https://via.placeholder.com/150?text=Bogota',
                'creation_date' => Carbon::create('2023', '03', '20'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Santa Marta',
                'image' => 'https://via.placeholder.com/150?text=Santa+Marta',
                'creation_date' => Carbon::create('2023', '04', '25'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Villa de Leyva',
                'image' => 'https://via.placeholder.com/150?text=Villa+de+Leyva',
                'creation_date' => Carbon::create('2023', '05', '30'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
