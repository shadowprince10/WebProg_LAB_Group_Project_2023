<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        Product::create([
            [
                'name' => 'love us war',
                'price' => 20000,
                'description' => 'manga chapter 10',
                'type' => 'book',
                'image' => 'Picture1.jpg',
            ],
            [
                'name' => 'Heroes of olympus',
                'price' => 20000,
                'description' => 'House of Hades',
                'type' => 'book',
                'image' => 'Picture2.jpg',
            ],
            [
                'name' => 'energel',
                'price' => 20000,
                'description' => 'energel pen',
                'type' => 'stationary',
                'image' => 'Picture3.jpg',
            ]
        ]);
    }
}
