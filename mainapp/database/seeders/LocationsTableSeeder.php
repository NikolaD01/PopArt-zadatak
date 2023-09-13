<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    public function run()
    {
        $serbianLocations = [
            'Belgrade',
            'Novi Sad',
            'Niš',
            'Subotica',
            'Kragujevac',
            'Čačak',
            'Kraljevo',
            'Zrenjanin',
            'Pancevo',
            'Novi Pazar',
            'Leskovac',
            'Valjevo',
            'Vranje',
            'Šabac',
            'Smederevo',
        ];

        foreach ($serbianLocations as $locationName) {
            DB::table('locations')->insert([
                'name' => $locationName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}