<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Main Course'],
            ['name' => 'Desserts'],
            ['name' => 'Beverages'],
            ['name' => 'Appetizers'],
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}
