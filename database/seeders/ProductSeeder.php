<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'title' => 'Product ' . $i,
                'slug' => Str::slug('Product ' . $i),
                'category_id' => rand(1, 5), 
                'price' => rand(100000, 500000),
                'sale' => rand(50000, 100000), 
                'image' => 'image' . $i . '.jpg',
                'content' => 'This is a description for Product ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
