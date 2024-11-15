<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Product::create([
                'name' => $faker->words(2, true),
                'description' => $faker->sentence(10),
                'price' => $faker->randomFloat(2, 10, 500),
                'quantity' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
