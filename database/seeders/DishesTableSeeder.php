<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dishes;

class DishesTableSeeder extends Seeder
{
    public function run(): void
    {
        $dishes = [
            [
                'name' => 'Fried Rice',
                'description' => 'Delicious fried rice with veggies.',
                'price' => 5000,
                'category_id' => 1,
                'status' => 'available',
                'image' => 'fried_rice.jpg'
            ],
            [
                'name' => 'Chocolate Cake',
                'description' => 'Rich chocolate flavor.',
                'price' => 3000,
                'category_id' => 2,
                'status' => 'available',
                'image' => 'chocolate_cake.jpg'
            ],
        ];

        foreach ($dishes as $dish) {
            Dishes::create($dish);
        }
    }
}
