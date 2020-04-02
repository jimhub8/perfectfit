<?php

use App\Seller;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Demographic($faker));
        $faker->addProvider(new Faker\Provider\en_HK\Address($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));
        foreach (range(1, 10) as $index) {
            Seller::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 4),
                'name' => $faker->name,
                'email' => $faker->secondarySchool,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'county' => $faker->city,
                'town' => $faker->town,
                'gender' => $faker->gender,
                'phone' => $faker->phoneNumber,
                'postal' => $faker->postcode,
                'contact_person' => $faker->name,
                'contact_phone' => $faker->phoneNumber,
                'contact_email' => $faker->safeEmail,
                'image' => $faker->imageUrl(),
            ]);
        }
    }
}
