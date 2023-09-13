<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [];

        // Create top-level categories
        $categories[] = [
            'categoryName' => 'Computer',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now()
        ];

        $categories[] = [
            'categoryName' => 'Clothing',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now()
        ];

        // Insert top-level categories
        DB::table('categories')->insert($categories);

        // Clear the array for re-use
        $categories = [];

        // Create subcategories
        $categories[] = [
            'categoryName' => 'Components',
            'parent_id' => 1, // Parent is Computer
            'created_at' => now(),
            'updated_at' => now()
        ];

        $categories[] = [
            'categoryName' => 'Accessories',
            'parent_id' => 2, // Parent is Clothing
            'created_at' => now(),
            'updated_at' => now()
        ];

        // Insert subcategories
        DB::table('categories')->insert($categories);

        // Create more categories as needed
        $categories = [];

        $categories[] = [
            'categoryName' => 'Keyboard',
            'parent_id' => 3, // Parent is Components
            'created_at' => now(),
            'updated_at' => now()
        ];

        $categories[] = [
            'categoryName' => 'Mouse',
            'parent_id' => 3, // Parent is Components
            'created_at' => now(),
            'updated_at' => now()
        ];

        $categories[] = [
            'categoryName' => 'Shirts',
            'parent_id' => 4, // Parent is Accessories
            'created_at' => now(),
            'updated_at' => now()
        ];

        $categories[] = [
            'categoryName' => 'Pants',
            'parent_id' => 4, // Parent is Accessories
            'created_at' => now(),
            'updated_at' => now()
        ];

        $categories = [];

        $categories[] = [
            'categoryName' => 'Electronics',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $categories[] = [
            'categoryName' => 'Appliances',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $categories[] = [
            'categoryName' => 'Laptops',
            'parent_id' => 5, // Parent is Electronics
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $categories[] = [
            'categoryName' => 'Desktops',
            'parent_id' => 5, // Parent is Electronics
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $categories[] = [
            'categoryName' => 'Refrigerators',
            'parent_id' => 6, // Parent is Appliances
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $categories[] = [
            'categoryName' => 'Washers',
            'parent_id' => 6, // Parent is Appliances
            'created_at' => now(),
            'updated_at' => now(),
        ];


        // Insert additional categories
        DB::table('categories')->insert($categories);
    }
}
