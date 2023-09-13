<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 8) as $productID) {
            foreach (range(1, 3) as $commentIndex) {
                DB::table('comments')->insert([
                    'content' => $faker->paragraph,
                    'user_id' => $faker->numberBetween(1, 10), // Assuming you have 10 users
                    'product_id' => $productID,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
