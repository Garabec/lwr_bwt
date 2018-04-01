<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all()->pluck('id')->toArray();
      for ($i=0;$i<100;$i++) {
        Product::insert([
            'name' => strtoupper($faker->word),
            'price' => $faker->numberBetween($min = 1000, $max = 9000),
            'description'=>$faker->text(100),
            'user_id' => $faker->randomElement($users),
            'created_at' => date_format($faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now'),"Y-m-d"),
            'updated_at' => date_format($faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now'),"Y-m-d"),
        ]);
      }
    }
}
