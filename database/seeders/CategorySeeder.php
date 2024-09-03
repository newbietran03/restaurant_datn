<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Appetizers', 'slug' => Str::slug('Appetizers'), 'image' => 'appetizers.jpg'],
            ['name' => 'Main Courses', 'slug' => Str::slug('Main Courses'), 'image' => 'main-courses.jpg'],
            ['name' => 'Desserts', 'slug' => Str::slug('Desserts'), 'image' => 'desserts.jpg'],
            ['name' => 'Beverages', 'slug' => Str::slug('Beverages'), 'image' => 'beverages.jpg'],
            ['name' => 'Specials', 'slug' => Str::slug('Specials'), 'image' => 'specials.jpg'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'image' => $category['image'],
                'anHien' => 1, // Giá trị mặc định
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
