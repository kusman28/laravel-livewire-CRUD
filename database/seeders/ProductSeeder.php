<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $prod = 1;

        while ($prod <= 3) 
        {
            DB::table('products')->insert([
                'name' => 'Test Product ' . rand(1, 5),
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil unde consequuntur dolorum sequi, qui libero.',
                'price' => rand(100, 2000),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $prod++;
        }

    }
}
