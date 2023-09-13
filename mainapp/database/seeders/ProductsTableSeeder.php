<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'price' => $faker->randomNumber(2),
                'phonenumber' => $faker->phoneNumber,
                'status' => $faker->word,
                'location_id' => $faker->numberBetween(1, 15), // Assuming you have 15 locations
                'user_id' => $faker->numberBetween(1, 10), // Assuming you have 10 users
                'category_id' => $faker->numberBetween(1, 5), // Assuming you have 15 categories
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
