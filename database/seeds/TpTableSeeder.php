<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;
use App\Tag;

class TpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $products = Product::all()->pluck('id')->toArray();
        $tags = Tag::all()->pluck('id')->toArray();
        
        
      for ($i=0;$i<100;$i++) {
        DB::table('tp')->insert([
            'product_id' => (int)$faker->randomElement($products),
            'tag_id' => (int)$faker->randomElement($tags),
            
        ]);
      }
        
        //
    }
}
