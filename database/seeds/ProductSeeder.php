<?php

use App\models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        foreach (range(1, 100) as $index) {
            Product::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 4),
                'seller_id' => $faker->numberBetween($min = 1, $max = 4),
                'product_name' => $faker->productName,
                'description' => $faker->text,
                'price' => $faker->numberBetween($min = 200, $max = 4000),
                'quantity' => $faker->numberBetween($min = 10, $max = 1000),
            ]);
        }
    }
}
